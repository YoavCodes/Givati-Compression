<!doctype html>
<html lang="en">
<head>
  <title>Givati Compression</title>
  
  <style type="text/css">
  div {
  	border: 2px solid #000;
  	padding: 5px;
  	max-height: 200px;
  	overflow: scroll;
  	width: 60%;

  }
  </style>

  <script language="javascript" type="text/javascript" src="/compression/assets/js/givati.js"></script>
</head>
<body>
  <script language="javascript" type="text/javascript">
  	function test(num) {
  		var u = document.getElementById("test"+num+"d").innerHTML;
  		var d = givati.compress(u);
  		var c = document.getElementById("test"+num+"c");
  		var i = document.getElementById("test"+num+"i");
  		c.innerHTML = d;
  		i.innerHTML = "" + u.length + "bytes - " + "" + c.innerHTML.length + "bytes = " + (u.length - c.innerHTML.length) + " bytes saved (" + (c.innerHTML.length / u.length * 100).toFixed(2) + "% the size of original string)"
  	}
  </script>
</body>

<h2>Givati Compression Algorithm</h2>
<br /><hr /><br />

<div id="test1d">Hi, how are you today. For today- it is a blast. Yes today is good.-, 0Hi, how are you today. For today- it is a blast. Yes today is good.-</div>
<div id="test1c"></div>
<div id="test1i"></div>
<input type="button" value="compress" onclick="test('1')" />

<br /><hr /><br />

<div id="test2d">[{"f":{"x":218,"y":280},"t":{"x":217.52549551287666,"y":280.49810510315},"l":199.60000610351562,"c":"10,54,94","o":0.67},{"f":{"x":217.52549551287666,"y":280.49810510315},"t":{"x":218.00178907330147,"y":280.6235726985056},"l":199.1999969482422,"c":"10,54,94","o":0.67},{"f":{"x":218.00178907330147,"y":280.6235726985056},"t":{"x":218.37719566384663,"y":280.70139169623593},"l":198.8000030517578,"c":"10,54,94","o":0.67},{"f":{"x":218.37719566384663,"y":280.70139169623593},"t":{"x":218.33887605140478,"y":281.1438066531573},"l":198.39999389648438,"c":"10,54,94","o":0.67},{"f":{"x":218.33887605140478,"y":281.1438066531573},"t":{"x":218.49491889020584,"y":281.203670595716},"l":198.8000030517578,"c":"10,54,94","o":0.67},{"f":{"x":218.49491889020584,"y":281.203670595716},"t":{"x":219.20221776931504,"y":280.82390784896364},"l":199.1999969482422,"c":"10,54,94","o":0.67},{"f":{"x":219.20221776931504,"y":280.82390784896364},"t":{"x":219.54852673509342,"y":279.8817199176455},"l":199.60000610351562,"c":"10,54,94","o":0.67},{"f":{"x":219.54852673509342,"y":279.8817199176455},"t":{"x":220.56593006778306,"y":279.29670824714884},"l":200,"c":"10,54,94","o":0.67},{"f":{"x":220.56593006778306,"y":279.29670824714884},"t":{"x":222.1739246748656,"y":278.6106388810466},"l":200.39999389648438,"c":"10,54,94","o":0.67},{"f":{"x":222.1739246748656,"y":278.6106388810466},"t":{"x":224.3010912049175,"y":277.9121110621794},"l":200.8000030517578,"c":"10,54,94","o":0.67},{"f":{"x":224.3010912049175,"y":277.9121110621794},"t":{"x":226.6129747294763,"y":276.2475618715188},"l":201.1999969482422,"c":"10,54,94","o":0.67},{"f":{"x":226.6129747294763,"y":276.2475618715188},"t":{"x":229.17013698655765,"y":275.28571094767125},"l":201.60000610351562,"c":"10,54,94","o":0.67},{"f":{"x":229.17013698655765,"y":275.28571094767125},"t":{"x":231.14884233978967,"y":273.7942764660643},"l":202,"c":"10,54,94","o":0.67},{"f":{"x":231.14884233978967,"y":273.7942764660643},"t":{"x":232.95596777665526,"y":272.5059351227037},"l":202.39999389648438,"c":"10,54,94","o":0.67},{"f":{"x":232.95596777665526,"y":272.5059351227037},"t":{"x":234.8326512434946,"y":271.3458888099895},"l":202.8000030517578,"c":"10,54,94","o":0.67},{"f":{"x":234.8326512434946,"y":271.3458888099895},"t":{"x":236.8368559660391,"y":270.96912427386286},"l":203.1999969482422,"c":"10,54,94","o":0.67},{"f":{"x":236.8368559660391,"y":270.96912427386286},"t":{"x":240.97335667479607,"y":268.5514509643616},"l":203.60000610351562,"c":"10,54,94","o":0.67},{"f":{"x":240.97335667479607,"y":268.5514509643616},"t":{"x":245.4736165729037,"y":266.3042563978346},"l":204,"c":"10,54,94","o":0.67},{"f":{"x":245.4736165729037,"y":266.3042563978346},"t":{"x":250.1927639145096,"y":263.4808977918873},"l":204.39999389648438,"c":"10,54,94","o":0.67},{"f":{"x":250.1927639145096,"y":263.4808977918873},"t":{"x":254.9944610924214,"y":261.05080159070076},"l":204.8000030517578,"c":"10,54,94","o":0.67},{"f":{"x":254.9944610924214,"y":261.05080159070076},"t":{"x":260.512109417591,"y":257.6771767709388},"l":205.1999969482422,"c":"10,54,94","o":0.67},{"f":{"x":260.512109417591,"y":257.6771767709388},"t":{"x":265.50166456153727,"y":254.40773023491016},"l":205.60000610351562,"c":"10,54,94","o":0.67},{"f":{"x":265.50166456153727,"y":254.40773023491016},"t":{"x":271.70521198327083,"y":251.26504285882393},"l":206,"c":"10,54,94","o":0.67},{"f":{"x":271.70521198327083,"y":251.26504285882393},"t":{"x":278.87854612129365,"y":247.53040186251332},"l":206.39999389648438,"c":"10,54,94","o":0.67},{"f":{"x":278.87854612129365,"y":247.53040186251332},"t":{"x":284.8690773721284,"y":244.48197102804986},"l":206.8000030517578,"c":"10,54,94","o":0.67},{"f":{"x":284.8690773721284,"y":244.48197102804986},"t":{"x":291.6297683679001,"y":240.7271649200111},"l":207.1999969482422,"c":"10,54,94","o":0.67},{"f":{"x":291.6297683679001,"y":240.7271649200111},"t":{"x":298.2765844672386,"y":237.12009422256295},"l":207.60000610351562,"c":"10,54,94","o":0.67},{"f":{"x":298.2765844672386,"y":237.12009422256295},"t":{"x":305.4499737662686,"y":233.9286151173894},"l":208,"c":"10,54,94","o":0.67},{"f":{"x":305.4499737662686,"y":233.9286151173894},"t":{"x":311.91491874417454,"y":230.28378251026803},"l":208.39999389648438,"c":"10,54,94","o":0.67},{"f":{"x":311.91491874417454,"y":230.28378251026803},"t":{"x":318.19598220701073,"y":227.2659958848906},"l":208.8000030517578,"c":"10,54,94","o":0.67},{"f":{"x":318.19598220701073,"y":227.2659958848906},"t":{"x":324.8792263202491,"y":223.76658646547182},"l":209.1999969482422,"c":"10,54,94","o":0.67},{"f":{"x":324.8792263202491,"y":223.76658646547182},"t":{"x":331.0040261622034,"y":220.86727118049214},"l":209.60000610351562,"c":"10,54,94","o":0.67},{"f":{"x":331.0040261622034,"y":220.86727118049214},"t":{"x":337.54153420138,"y":217.37475421532497},"l":210,"c":"10,54,94","o":0.67},{"f":{"x":337.54153420138,"y":217.37475421532497},"t":{"x":343.32329466895783,"y":214.70087913154396},"l":210.39999389648438,"c":"10,54,94","o":0.67},{"f":{"x":343.32329466895783,"y":214.70087913154396},"t":{"x":349.33070317199764,"y":211.5362644097851},"l":210.8000030517578,"c":"10,54,94","o":0.67},{"f":{"x":349.33070317199764,"y":211.5362644097851},"t":{"x":354.5431258204254,"y":208.2040731400235},"l":211.1999969482422,"c":"10,54,94","o":0.67},{"f":{"x":354.5431258204254,"y":208.2040731400235},"t":{"x":360.0562546978968,"y":205.27563121680205},"l":211.60000610351562,"c":"10,54,94","o":0.67},{"f":{"x":360.0562546978968,"y":205.27563121680205},"t":{"x":365.93101234081576,"y":202.7645130070969},"l":212,"c":"10,54,94","o":0.67},{"f":{"x":365.93101234081576,"y":202.7645130070969},"t":{"x":370.9032822764427,"y":200.6669266854273},"l":212.39999389648438,"c":"10,54,94","o":0.67},{"f":{"x":370.9032822764427,"y":200.6669266854273},"t":{"x":375.7424745037378,"y":197.92608281437327},"l":212.8000030517578,"c":"10,54,94","o":0.67},{"f":{"x":375.7424745037378,"y":197.92608281437327},"t":{"x":380.5783546556566,"y":195.4562734641766},"l":213.1999969482422,"c":"10,54,94","o":0.67},{"f":{"x":380.5783546556566,"y":195.4562734641766},"t":{"x":384.64976481063565,"y":193.37960791148652},"l":213.60000610351562,"c":"10,54,94","o":0.67},{"f":{"x":384.64976481063565,"y":193.37960791148652},"t":{"x":389.0708474206901,"y":191.7108751880672},"l":214,"c":"10,54,94","o":0.67},{"f":{"x":389.0708474206901,"y":191.7108751880672},"t":{"x":393.1505530171842,"y":190.34428448096466},"l":214.39999389648438,"c":"10,54,94","o":0.67},{"f":{"x":393.1505530171842,"y":190.34428448096466},"t":{"x":396.7332978132718,"y":189.11594907770922},"l":214.8000030517578,"c":"10,54,94","o":0.67},{"f":{"x":396.7332978132718,"y":189.11594907770922},"t":{"x":400.3319263295299,"y":187.69890642556862},"l":215.1999969482422,"c":"10,54,94","o":0.67},{"f":{"x":400.3319263295299,"y":187.69890642556862},"t":{"x":403.03880262229853,"y":186.50463835840088},"l":215.60000610351562,"c":"10,54,94","o":0.67},{"f":{"x":403.03880262229853,"y":186.50463835840088},"t":{"x":405.65482605458925,"y":185.38120173465177},"l":216,"c":"10,54,94","o":0.67},{"f":{"x":405.65482605458925,"y":185.38120173465177},"t":{"x":408.0029363290656,"y":184.68529211800248},"l":216.39999389648438,"c":"10,54,94","o":0.67},{"f":{"x":408.0029363290656,"y":184.68529211800248},"t":{"x":409.26481718692986,"y":184.2110987071658},"l":216.8000030517578,"c":"10,54,94","o":0.67},{"f":{"x":409.26481718692986,"y":184.2110987071658},"t":{"x":411.251142927208,"y":184.11272038968852},"l":217.1999969482422,"c":"10,54,94","o":0.67},{"f":{"x":411.251142927208,"y":184.11272038968852},"t":{"x":412.28339705191127,"y":184.1431639848836},"l":217.60000610351562,"c":"10,54,94","o":0.67},{"f":{"x":412.28339705191127,"y":184.1431639848836},"t":{"x":411.9720254736399,"y":185.33236165040103},"l":218,"c":"10,54,94","o":0.67},{"f":{"x":411.9720254736399,"y":185.33236165040103},"t":{"x":411.51638912170876,"y":187.62918396389196},"l":218.39999389648438,"c":"10,54,94","o":0.67},{"f":{"x":411.51638912170876,"y":187.62918396389196},"t":{"x":410.4323292746603,"y":189.5340200531196},"l":218.8000030517578,"c":"10,54,94","o":0.67},{"f":{"x":410.4323292746603,"y":189.5340200531196},"t":{"x":409.98199076344906,"y":191.5916707749554},"l":219.1999969482422,"c":"10,54,94","o":0.67},{"f":{"x":409.98199076344906,"y":191.5916707749554},"t":{"x":407.85910224276336,"y":194.71254772373425},"l":219.60000610351562,"c":"10,54,94","o":0.67},{"f":{"x":407.85910224276336,"y":194.71254772373425},"t":{"x":405.1597532397652,"y":198.75741384883776},"l":220,"c":"10,54,94","o":0.67},{"f":{"x":405.1597532397652,"y":198.75741384883776},"t":{"x":402.9255952592762,"y":202.39513702629878},"l":220.39999389648438,"c":"10,54,94","o":0.67},{"f":{"x":402.9255952592762,"y":202.39513702629878},"t":{"x":399.3346004926716,"y":207.32539875146946},"l":220.8000030517578,"c":"10,54,94","o":0.67},{"f":{"x":399.3346004926716,"y":207.32539875146946},"t":{"x":396.3481696066889,"y":211.04729272155626},"l":221.1999969482422,"c":"10,54,94","o":0.67},{"f":{"x":396.3481696066889,"y":211.04729272155626},"t":{"x":392.3303002797102,"y":215.9009128157583},"l":221.60000610351562,"c":"10,54,94","o":0.67},{"f":{"x":392.3303002797102,"y":215.9009128157583},"t":{"x":388.827977217724,"y":221.1010362592737},"l":222,"c":"10,54,94","o":0.67},{"f":{"x":388.827977217724,"y":221.1010362592737},"t":{"x":383.63336873459656,"y":226.55206906172157},"l":222.39999389648438,"c":"10,54,94","o":0.67},{"f":{"x":383.63336873459656,"y":226.55206906172157},"t":{"x":379.444011506133,"y":232.04475784718275},"l":222.8000030517578,"c":"10,54,94","o":0.67},{"f":{"x":379.444011506133,"y":232.04475784718275},"t":{"x":374.14533878689116,"y":238.3744982555551},"l":223.1999969482422,"c":"10,54,94","o":0.67},{"f":{"x":374.14533878689116,"y":238.3744982555551},"t":{"x":368.9440701330767,"y":244.86915173256227},"l":223.60000610351562,"c":"10,54,94","o":0.67},{"f":{"x":368.9440701330767,"y":244.86915173256227},"t":{"x":363.86612865354846,"y":250.74872024418028},"l":224,"c":"10,54,94","o":0.67},{"f":{"x":363.86612865354846,"y":250.74872024418028},"t":{"x":358.10163560159265,"y":256.8901394517158},"l":224.39999389648438,"c":"10,54,94","o":0.67}]
</div>
<div id="test2c"></div>
<div id="test2i"></div>
<input type="button" value="compress" onclick="test('2')" />

<br /><hr /><br />

<div id="test3d">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, quis gravida magna mi a libero. Fusce vulputate eleifend sapien. Vestibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus. Nullam accumsan lorem in dui. Cras ultricies mi eu turpis hendrerit fringilla. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In ac dui quis mi consectetuer lacinia. Nam pretium turpis et arcu. Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Sed aliquam ultrices mauris. Integer ante arcu, accumsan a, consectetuer eget, posuere ut, mauris. Praesent adipiscing. Phasellus ullamcorper ipsum rutrum nunc. Nunc nonummy metus. Vestibulum volutpat pretium libero. Cras id dui. Aenean ut eros et nisl sagittis vestibulum. Nullam nulla eros, ultricies sit amet, nonummy id, imperdiet feugiat, pede. Sed lectus. Donec mollis hendrerit risus. Phasellus nec sem in justo pellentesque facilisis. Etiam imperdiet imperdiet orci. Nunc nec neque. Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi. Curabitur ligula sapien, tincidunt non, euismod vitae, posuere imperdiet, leo. Maecenas malesuada. Praesent congue erat at massa. Sed cursus turpis vitae tortor. Donec posuere vulputate arcu. Phasellus accumsan cursus velit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed aliquam, nisi quis porttitor congue, elit erat euismod orci, ac placerat dolor lectus quis orci. Phasellus consectetuer vestibulum elit. Aenean tellus metus, bibendum sed, posuere ac, mattis non, nunc. Vestibulum fringilla pede sit amet augue. In turpis. Pellentesque posuere. Praesent turpis. Aenean posuere, tortor sed cursus feugiat, nunc augue blandit nunc, eu sollicitudin urna dolor sagittis lacus. Donec elit libero, sodales nec, volutpat a, suscipit non, turpis. Nullam sagittis. Suspendisse pulvinar, augue ac venenatis condimentum, sem libero volutpat nibh, nec pellentesque velit pede quis nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Fusce id purus. Ut varius tincidunt libero. Phasellus dolor. Maecenas vestibulum mollis diam. Pellentesque ut neque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In dui magna, posuere eget, vestibulum et, tempor auctor, justo. In ac felis quis tortor malesuada pretium. Pellentesque auctor neque nec urna. Proin sapien ipsum, porta a, auctor quis, euismod ut, mi. Aenean viverra rhoncus pede. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Ut non enim eleifend felis pretium feugiat. Vivamus quis mi. Phasellus a est. Phasellus magna. In hac habitasse platea dictumst. Curabitur at lacus ac velit ornare lobortis. Curabitur a felis in nunc fringilla tristique. Morbi mattis ullamcorper velit. Phasellus gravida semper nisi. Nullam vel sem. Pellentesque libero tortor, tincidunt et, tincidunt eget, semper nec, quam. Sed hendrerit. Morbi ac felis. Nunc egestas, augue at pellentesque laoreet, felis eros vehicula leo, at malesuada velit leo quis pede. Donec interdum, metus et hendrerit aliquet, dolor diam sagittis ligula, eget egestas libero turpis vel mi. Nunc nulla. Fusce risus nisl, viverra et, tempor et, pretium in, sapien. Donec venenatis vulputate lorem. Morbi nec metus. Phasellus blandit leo ut odio. Maecenas ullamcorper, dui et placerat feugiat, eros pede varius nisi, condimentum viverra felis nunc et lorem. Sed magna purus, fermentum eu, tincidunt eu, varius ut, felis. In auctor lobortis lacus. Quisque libero metus, condimentum nec, tempor a, commodo mollis, magna. Vestibulum ullamcorper mauris at ligul</div>
<div id="test3c"></div>
<div id="test3i"></div>
<input type="button" value="compress" onclick="test('3')" />

<br /><hr /><br />
</html>