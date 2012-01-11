# GIVATI Compression

The algorithm selects two separators from an alphabet of around 90 ascii characters. The segments characters cannot appear in the uncompressed text. It then looks at every substring, so in the text "hello", it would look at "h", "he", "hel", "hell", "hello", "e", "el"... and so on and adds potentially viable substrings to a register. It calculates each substring's priority based on the number of bytes it would save if added to the dictionary where [ priority = (num matches) * length - (length + (num matches * 2)) ] and puts them in a catalog sorted by priority. It then moves through the the substrings from most effective to least recalculating priorities as it simulates removing the substrings, thus pruning and resorting the catalog. It then creates a hash table ie: the dictionary using the alphabet as a base(alphabet.length) number system. Should the size of the dictionary exceed the size of the alphabet it fills in the "leading zeros" in the dictionary. It then uses regular expressions to apply the hashtable to the data compressing it and then amends the dictionary along with header information to the compressed data.

The compressed data structure is as follows

---
**compressed data structure**
	
    1 byte 																	| separator 1
    1 byte																	| separator 2
    n bytes separated by 1st separator										| dictionary of keys/values assumed to altenate
    1 byte 2nd separator													| end of dictionary
    m bytes of 1st separator												| where m is order of magnitude
    n bytes of data represented with fixed magnitude of m “leading zeros” 	| compressed data

---

The data can then be decompressed without pre-agreeing on a dictionary or any other information. This is optimal for sending compressed data to arbitrary recipients, or long term data storage. Because it's smart and prioritizes substrings to create the dictionary before any actual compression is done it typically achieves better compression than algorithms that step through the data and build their dictionary linearly. In high entropy or short data where compression would result in increased size it opts not to compress anything, this again is in contrast to linear algorithms like lzw.

## TODO
* Ability to manually provide a static or seed dictionary, for cases where pre-determining a dictionary can save additional bytes and allow more customization
* port to Python and PHP  
* optimize code and algorithm