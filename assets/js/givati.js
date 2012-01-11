/* GIVATI COMPRESSION - ORIGINAL REFERENCE IMPLEMENTATION by Yoav Givati (http://yoavgivati.com) MIT Licenced */

var givati = function() {
	
	/* GIVATI COMPRESSION ALGORITHM*/
	/*
		@_original: object, or string							// item to compress
		@_type: string ['object', 'json', 'jsonh', 'text']		// type of item to compress
		@_restrict_dictionary_size: int							// force certain dictionary size, note: this includes hash conflicts
		@_dictionary array					!!TODO!!			// user supplied array of substrings for dictionar
		@_is_static_dictionary boolean		!!TODO!!			// whether user supplied dictionary is a seed or the final static dictionary
	*/
	function compress(_original, _type, _restrict_dictionary_size, _dictionary, _is_static_dictionary) {
		// alphabet of usable one byte ascii characters, sort characters least likely to cause hash conflicts to most, 
		// ie: alphabet[0] = least likely to exist in input, alphabet[-1] most likely. 
		var alphabet = [];
		var alphabet_json = [["*"],["/"],["\\"],["+"],["="],["|"],["`"],["."],["!"],["?"],["("],[")"],["#"],["$"],["%"],["@"],[">"],["<"],[";"],["&"],["_"],[";"],["b"],["c"],["d"],["f"],["g"],["h"],["j"],["k"],["l"],["m"],["n"],["p"],["q"],["r"],["s"],["u"],["v"],["w"],["x"],["y"],["z"],["A"],["B"],["C"],["D"],["E"],["F"],["G"],["H"],["I"],["J"],["K"],["L"],["M"],["N"],["O"],["P"],["Q"],["R"],["S"],["T"],["U"],["V"],["W"],["X"],["Y"],["Z"],["~"],["-"],["i"],["o"],["t"],["a"],["e"],["0"],["1"],["2"],["3"],["4"],["5"],["6"],["7"],["8"],["9"],["'"],["["],["]"],[":"],["{"],["}"]];		
		var alphabet_english = [["*"],["["],["]"],["/"],["\\"],["+"],["="],["{"],["|"],["}"],["`"],["."],["!"],["?"],["("],[")"],["#"],["$"],["%"],["@"],["~"],["-"],[">"],["<"],[";"],["'"],["&"],["_"],[":"],[";"],["b"],["c"],["d"],["f"],["g"],["h"],["j"],["k"],["l"],["m"],["n"],["p"],["q"],["r"],["s"],["u"],["v"],["w"],["x"],["y"],["z"],["A"],["B"],["C"],["D"],["E"],["F"],["G"],["H"],["I"],["J"],["K"],["L"],["M"],["N"],["O"],["P"],["Q"],["R"],["S"],["T"],["U"],["V"],["W"],["X"],["Y"],["Z"],["0"],["1"],["2"],["3"],["4"],["5"],["6"],["7"],["8"],["9"],["i"],["o"],["t"],["a"],["e"]];
			
		if(_type === undefined) {
			_type = typeof _original;	
		}

		switch(_type) {
			case "object":
				_original = JSON.stringify(_original);
				alphabet = alphabet_json;
				break;
			default: // text
				_original = _original.toString();
				alphabet = alphabet_english;
				break;
		}
		
		var s = []; // array of separators
		//find two separators from our alphabet that do not exist in the _original, starting with the expected to be most common
		for(var i = alphabet.length-1; i >= 0; i--) {
			if(s.length < 2) {
				if(_original.match(new RegExp(RegExp.escape(alphabet[i]), "g")) === null) {
					s.push(alphabet[i]);
					alphabet.splice(i, 1);
				}
			}
			
		}
		
		if(_restrict_dictionary_size === 0) {
				_restrict_dictionary_size = undefined;
		}

		var _compressed = _original.toString(); // define compressed output to be worked on		
		var register = {}; // keeps full array of unique substrings  register["substring"] = num_matches
		var catalog = []; // keeps sortable array of preferred substrings indexed by their priority  catalog[5] = {"substring"}
		var dictionary = {}; // keeps the final dictionary for compression.  dictionary["substring"] = "alphabet_hash"
		// substring position
		var st = "" // current substring
		var sp = 0; // start position
		var ep = 0; // end position
		var numMatches = 0;
		var numSubstrings = 0; 
		var numPrioritySubstrings = 0;
		var i = 0; // reusable iterator for top level while loops
		
		// naive search to build register with unique substrings, and assign priority based on potential data compression if only the given substring is used
		var draftCatalog = [];
		while(sp < _compressed.length) {
			ep = sp;
			numMatches = 0;
			var w = "";
			var lw = ""; // stores last w variable
			do {
				lw = w;
				w += _compressed.charAt(ep);
				if(register[w] === undefined) {
					
					
					// create string for the orderOfMagnitude leading zeros
					// remove matches for 
					numMatches = _compressed.match(new RegExp(RegExp.escape(w), "g")).length
					register[w] = [numMatches];
					numSubstrings += 1;
					
					// determine priority
					if(lw !== "" && (register[w] + w.length) != (register[lw] + lw.length)) {
						// don't even consider it if it's too small to not increase the size of the string with stored dictionary
						// every item found is put in the dictionary, plus a separator, hash(typically 1 or two bytes), plus the number of matches * hash
						// we don't want to do that math for everything so first skip the obvious space gainers
						if(lw.length > 2 && register[lw] > 1 || lw.length === 2 && register[lw] > 2) {
							// priority = num matches * length - (length + (num matches * 2))
							var priority = register[lw] * lw.length - (lw.length + (register[lw] * 3));
							if(priority > 0) {
								draftCatalog[priority] = lw;
							}
						}
					} else {}
					
					
				} else {}
				ep += 1;
			} while (ep < _compressed.length && numMatches > 1);
			
						//document.write(catalog[0])
			sp += 1;
		}
		
		// compile final catalog
		// we now re-assess priority to weed out useless substrings by removing the highest priority strings from the uncompressed data first and seeing if there are still matches for lower priority substrings. If not, we chuck 'em.
		i = draftCatalog.length;
		var compressionAnalog = _compressed;
		numPrioritySubstrings = 0;
		var highestPriority = 0;
		while (i--) {
			if(draftCatalog[i] !== undefined) {
				var tempAnalog = compressionAnalog; // save current state, only save changes to compressionAnalog if we keep the substring
				var matches = compressionAnalog.match(new RegExp(RegExp.escape(draftCatalog[i]), "g"));
				if(matches === null) {
					matches = ""; // this will return 0 length
				}
				var numMatches = matches.length 
				// calculate new priority
				// priority = num matches * length - (length + (num matches * 2))
				var newpriority = numMatches * draftCatalog[i].length - (draftCatalog[i].length + (numMatches * 3));
				// if there's still a worthwile match
				if(newpriority > 0) {
					// add it to the final catalog 
					catalog[newpriority] = draftCatalog[i];
					// remove all instances of the previous substring
					compressionAnalog = compressionAnalog.replace(new RegExp(RegExp.escape(draftCatalog[i]), "g"), ""); 
					numPrioritySubstrings += 1;	
					highestPriority = Math.max(highestPriority, newpriority);
				}
			}
			
		}
		
		// find any conflicts between the uncompressed data and the hashes we're using
		i = 0;
		var conflicts = [];
		while(i < numPrioritySubstrings && i < alphabet.length) {
			var matches = compressionAnalog.match(new RegExp(RegExp.escape(alphabet[i]), "g"));
			if(matches !== null) {
				conflicts.push(alphabet[i]);
				numPrioritySubstrings += 1;
			}
			i += 1;
		}
		
		// add conflicts to catalog backwards, so that the smallest base85 alphabet representation has highest priority
		for(var i = 0; i < conflicts.length; i++) {
	    	var priority = highestPriority + conflicts.length - i
			catalog[priority] = conflicts[i][0];
		}

		// compile dictionary
		i = catalog.length; // catalog will be as long as the highest priority substring, with lots of undefined keys distributed throughout
		var a = 0; //alphabet iterator index
		var h = 0; //hashprefix iterator index
		var b = [0]; //number of hashprefix bytes array of interator indexes
		var numDictionaryItems = 0;
		var hashprefix = ""; //if we move to two byte hashes, this stores the first byte and so on.
		var testcompress = "";
		var temptestcompress = "";
		while (i--) {
			// loop backwards through the catalog placing highest priority substrings first in the dictionary	
			if(catalog[i] !== undefined) {
				// if we're manually restricting dictionary size
				if(_restrict_dictionary_size === undefined || _restrict_dictionary_size > numDictionaryItems) {
					dictionary[catalog[i]] = hashprefix + alphabet[b[0]];
					numDictionaryItems += 1;
				}
				b[0] += 1;
				// this essentially creates a base(alphabet.length) number system
				if(b[0] === alphabet.length) {					
					if(b[b.length-1] == alphabet.length) {
						b.push(-1);
					}
					b[0] = 0;
					hashprefix = "";
					for(var k = 0; k < b.length; k++) {
						if (k !== 0) { // we've already incremented b[0]
							b[k] += 1;	
							if(b[k] === alphabet.length) {
								b[k] = 0;
							}
							hashprefix = alphabet[b[k]] + hashprefix;
						}
					}
				}
			}
		}
		
		var dictString = "";
		// compress
		for(i in dictionary) {
			// loop through dictionary backwards replacing big stuff with little stuff
			// note Javascript doesn't have lookbehinds, so we need to regexes, we want to change all matches except for those between separators
			 	// matches everything without a hyphen after it
			_compressed = _compressed.replace(new RegExp(RegExp.escape(i) + "(?!-)", "g"), s[0] + dictionary[i] + s[0]); 
				// matches if there's a hyphen after, but not before
			_compressed = _compressed.replace(new RegExp("([^-])(" + RegExp.escape(i) + ")(-)", "g"), "$1" + s[0] + dictionary[i] + s[0] + "$3");
			// create string for the orderOfMagnitude leading zeros
			var leadingZeros = "";
			for(var j = 0; j < b.length; j++) {
				leadingZeros += alphabet[0];
			}
			// add dictionary to beginning of _compressed
			// create string for the orderOfMagnitude leading zeros
			var leadingZeros = "";
			for(var j = 0; j < b.length-1; j++) {
				leadingZeros += alphabet[0];
				
			}
			dictString = dictString + dictionary[i] + s[0] + leadingZeros + i + s[0]  
		}
		// remove final separator from dictString
		dictString = dictString.substring(0, dictString.length-1)

		//remove separators
		_compressed = _compressed.replace(new RegExp(RegExp.escape(s[0]), "g"), "")	
		

		var orderOfMagnitude = "";
		for(var i=0; i<b.length; i++) {
			orderOfMagnitude += s[0];
		}
		
		// compile final output
		_compressed = s[0] + s[1] + dictString + s[1] + orderOfMagnitude +  _compressed;
		
		/*	
			compressed file structure
			=========================	
			1 byte 																	| separator 1
			1 byte																	| separator 2
			n bytes separated by 1st separator										| dictionary of keys/values assumed to altenate
			1 byte 2nd separator													| end of dictionary
			m bytes of 1st separator												| where m is order of magnitude
			n bytes of data represented with fixed magnitude of m “leading zeros” 	| compressed data
		*/
		
		return _compressed
	}
	
	


	/* GIVATI DECOMPRESSION ALGORITHM*/
	function decompress(_compressed) {
		
		var s = []; // separators
		var dictionary = [];
		var dict = []; // intermediate array used to build dictionary
		var input = [];
		var magnitude = 0;
		
		//get seperators
		s[0] = _compressed.charAt(0);
		s[1] = _compressed.charAt(1);
		_compressed = _compressed.substr(2);
		input = _compressed.split(s[1]);
		magnitude = input[1].match(new RegExp(RegExp.escape(s[0]))).length
		input[1] = input[1].substr(magnitude);
		
		// parse and build dictionary
		dict = input[0].split(s[0]);
		for(var i = 0; i < dict.length; i+=2) {
			dictionary.push([dict[i], dict[i+1]]);
		} 
		var _original = input[1];
		
		
		// add separator
		_original = _original.replace(/(.{1})/g, s[0]+"$1");
		_original += s[0];
		// duplicate separator
		_original = _original.replace(new RegExp(RegExp.escape(s[0]), "g"), s[0]+s[0]);
		i = dictionary.length;
		
		while(i--) {
			// loop through dicationry replacing little stuff with big stuff
			_original = _original.replace(new RegExp(RegExp.escape(s[0]) + RegExp.escape(dictionary[i][0]) + RegExp.escape(s[0]), "g"), s[1]+dictionary[i][1]+s[1]);			
		}
		// remove temp separator
		_original = _original.replace(new RegExp(RegExp.escape(s[0]), "g"), "")
		_original = _original.replace(new RegExp(RegExp.escape(s[1]), "g"), "")
		return _original
	}
	
	/* HELPER FUNCTIONS */
	RegExp.escape = function(text) {
    	text = text.toString();
		var _reg = /[-[\]{}()*+?.,\\^$|#\s]/g
		
		return text.replace(_reg, "\\$&");
	}
	
	// Array Remove - By John Resig (MIT Licensed)
	Array.remove = function(from, to) {
	  var rest = this.slice((to || from) + 1 || this.length);
	  this.length = from < 0 ? this.length + from : from;
	  return this.push.apply(this, rest);
	};

	return {
        compress: compress,
        decompress: decompress
    };
	
}

var givati = new givati();
	