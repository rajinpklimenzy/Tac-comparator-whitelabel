<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="../doc_files/css/style.css">
</head>
<body>

<div class="container">
	<div class="exWrap">
		<div class="exColInfo">
			<div class="backLink">
			&larr; <a class="more-demos" href="../demos.html">More Demos </a> &nbsp;&nbsp;|&nbsp;&nbsp; 
			<a href="../documentation.html">Documentation</a> &nbsp;&nbsp;|&nbsp;&nbsp;
			<a target="_blank" href="https://codecanyon.net/item/iguider-jquery-webpage-help-tour/21073716">Get This Plugin</a>
			</div>
			<h1 class="el-title">Presentation</h1>
			<p>
				In this demo you will see the maximum features of the iGuider plugin.
			</p>
			
<div class="example-code">

<script src="tutorial/js/jquery-3.1.1.min.js"></script>

<link rel="stylesheet" href="tutorial/css/iGuider.css">
<script src="tutorial/js/jquery.iGuider.js"></script>

<link rel="stylesheet" href="tutorial/themes/material/iGuider-theme-material.css">
<script src="tutorial/themes/material/iGuider-theme-material.js"></script>	

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
$(window).on('load',function(){
	var preseOpt = {
		
		tourTitle:'Presentation',
		
		overlayColor:'#111626',
		loc:'/',
		
		tourMap: {
			open:true
		},
		intro:{
			cover:'../doc_files/images/590x300.jpg'
		},
		lang:{
			introTitle:'Welcome to the interactive tour iGuider',
			introContent:'Now this tour will tell you about himself'
		},
		steps:[{
			title:'Let\'s get acquainted!',	
			position:'center',			
			content:'<p>My name is "iGuider" and I like to talk about the different interfaces.</p><p>But first I\'ll tell you about myself.</p><p>At the bottom of this window there is the «NEXT» button, click on it and we move on to the next step of our acquaintance.</p>'
		},
		{
			title:'Let\'s start about my opportunities',			
			content:'<p>I can highlight any element on the page.</p><p>Now I have highlighted the headline and at the same time it was available for selection with the mouse.</p><p>I wonder what will happen next? Then click «NEXT»</p>',				
			target:'.el-title'
		},
		{
			title:'So exciting!',			
			content:'<p>You noticed how smoothly I move from one element to another?</p><p>Click «NEXT» and go on!</p>',				
			target:'el-1'
		},
		{
			title:'You are so wonderful!',			
			content:'<p>And you must have noticed that I can display message window from left, right, top and bottom of the element. </p><p>To be precise, I have left 37 different positions.</p><p>You\'re probably thinking: "This guy is really cool." You\'re right!</p><p>In the next step I\'m going to surprise you again!</p><p>Rather click  to «NEXT» button.</p>',				
			target:'.el-16'
		},
		{
			title:'Not expected?',			
			content:'<p>I\'m better than everyone else, because I know how to define myself a better position for the message box.</p><p> Yes, yes, yes I have Artificial Intelligence!</p><p>Clicks «NEXT», and you will know why I\'m the coolest!</p>',				
			target:'.el-13'
		},{
			title:'I am in a good mood!',			
			content:'<p>So I made the color of the overlay layer bright as my mood!</p>',				
			target:'el-0',
			overlayColor:'#ff8a00'
		},{
			title:'Do you like blue?',			
			content:'<p>You are welcome!</p>',				
			target:'el-1',
			overlayColor:'blue'
		},{
			title:'Page updated manually',				
			content:'Refresh your browser page. F5 (⌘+R)',	
		},{
			title:'Page refreshes after form submission',
			content:'Click the button to submit the form and move to the next step.',		
			target:'.form-btn',
			event:'click'
		},{
			title:'And what about transparency?',			
			content:'<p>For me, and it\'s easy!</p>',				
			target:'el-1',
			overlayColor:'#3481c3',
			overlayOpacity:1
		},{
			title:'I also know how to prohibit',			
			content:'<p>I can disable any action with the selected item.</p><p>Now you can not click on the highlighted button</p>',				
			target:'b-1',
			disable:true
		},{
			title:'Okay, I\'ll let you!',			
			content:'<p>Try once more</p>',				
			target:'b-1',
			event:'click'
		},{
			title:'Come on daredevil!',
			content:'<p>Click to a highlighted element</p>',		
			target:"el-0",	
			event:'click'
		},
		{
			title:'Well done!',			
			content:'Click to a highlighted element again',	
			target:'el-1',					
			event:'click'
		},{
			title:'You are super!',		
			content:'Now double click to element',	
			target:'el-2',					
			event:'dblclick'
		},
		{
			title:'Good game!',		
			content:'<p>As you can see, I can respond to all <a target="_blank" href="https://api.jquery.com/category/events/">jquery events</a>. Yes all!</p> </p><p>If you have not fell in love with me click «NEXT»</p>',	
			position:'center'
		},
		
		{
			title:'width:500',				
			content:'For more convenient display of content, you can adjust the width of the window with the message.',	
			target:'el-2',
			width:500
		},{
			title:'width:\'50%\'',
			content:'You can change the width of the window by setting the value in pixels or persent (screen width relative). Try change browser screen width.',		
			width:'50%'
		},
		
		
		{
			before:function(){
				$('.add-new-item-2').remove();
			},
			title:'And what if the item is not on the page? And he does not appear immediately!',				
			content:'Click on this item to have a new item.',	
			target:'.add-new-item-1',
			event:'click'
		},{
			title:'And here he is!',				
			content:'Exactly what is needed!',	
			target:'.add-new-item-2',
			waitElementTime:3000
		},{
			title:'Do you want more space?',			
			content:'I can do this by increasing the space around the element.',	
			target:'el-0',					
			spacing:20
		},{
			title:'I can do more!',			
			content:'Something like this!',	
			target:'el-0',					
			spacing:40
		},{
			title:'What about form?',			
			content:'Personally, I really like the circle. Only not so big',	
			target:'el-1',					
			spacing:40,
			shape:1
		},{
			title:'This is what I like!',			
			content:'Very much!',	
			target:'el-1',					
			spacing:10,
			shape:1
		},{
			title:'Do you like rounded corners?',			
			target:'el-0',					
			spacing:20,
			shape:2
		},{
			title:'Very rounded!',			
			content:'Whatever you want!',	
			target:'el-1',					
			spacing:20,
			shape:2,
			shapeBorderRadius:30
		},{
			title:'And what about the two elements?',			
			content:'The message box switches from one element to another when you hover the cursor',	
			target:'.el-22',					
			shape:2,
		},{
			title:'Maybe three!',			
			content:'I can highlight any number of elements',	
			target:'.el-23',
			shape:2,
		},{
			title:'One is better!',			
			content:'',	
			target:'el-5'
		},{
			title:'Autoplay',
			content:'I can self-switch steps.',
			target:'.timer',
			timer:4000
		},{
			title:'Autoplay',
			content:'Now the duration of the step is 4 seconds.',	
			target:'.el-13',
			timer:4000
		},{
			title:'Autoplay',
			content:'And now 6 seconds.',	
			target:'.el-14',
			timer:6000
		},{
			title:'Tracking',
			content:'I can track position of the elements. Drag the item to another location',	
			target:'el-17'
		},{
			title:'Let\'s play!',			
			content:'<p>I will say what to do, and you perform.</p><p>Ready? Then go!</p>',		
			position:'center'
		},
		{
			title:'Now I\'ll show you magic!',		
			content:'<p>You just click on the button «NEXT» and I will switch elements myself.</p><p>Let\'s try!</p>',	
			target:'el-21',
			trigger:'click'	
		},{
			title:'Try more!',				
			content:'You are a great master! Keep up the good work!',	
			target:'el-22',
			trigger:'click'		
		},{
			title:'Voila!',				
			content:'<p>In the same way I can carry out all <a target="_blank" href="https://api.jquery.com/category/events/">jquery events</a> automatically.</p><p>Click the button "Next" guy</p> ',	
			target:'el-23',
			trigger:'click'		
		},{
			title:'Do you have a required field?',		
			content:'This tour will make you fill it.',	
			target:'.checkEl_1',
			checkNext: {
				'func': function(){
					if($.trim($('.checkEl_1').val()) == ''){
						return false;
					}else{
						return true;	
					}
				},
				'messageError': 'The field can not be empty!'
			}
		},{
			title:'I have a question!',				
			content:'<p>Have you seen the burger icon in the upper right corner of this modal window?</p><img src="../doc_files/images/p_1.png"><p>I knew it! Nobody doubted!</p><p>This icon is the call button of the tour map.</p><p>Click on this button and open the tour map to be able to switch between steps or completely cancel the tour.</p>',	
			position:'center'
		},
		{
			title:'For the first date enough!',				
			content:'<p>You are very intelligent and sociable and I was pleased to meet you.</p> <p>But you, probably, do not have time to explain everybody as your interface, script or template works.</p> <p>But I always have time for all! Buy me and we will be best friends.</p>',	
			target:'.el-title'
		}],
		debug:false
	}
	function myTour(){
		iGuider(preseOpt);
	}
	
	$('.start-tour').on('click',function(){
		myTour();
		return false;
	});
	iGuider('button',preseOpt);
	myTour();
	
	$('.custom-el-drag').draggable({
		drag: function( event, ui ) {
			iGuider('update');	
		}	
	});

	$('.add-new-item-1').on('click',function(){
		if(!$('.add-new-item-2').length){
			setTimeout(function(){
				$('.add-new-item-1').after('<span class="custom-element add-new-item-2"> New element </span>');
			},1000);
		}
	});
})
</script> 
<style>
.custom-el-drag { cursor:move}
form input {
	height: 60px;
	padding: 0 30px;
}
</style>
<p><a class="btn start-tour" href="#">Start Tour</a></p>

<span class="custom-element" data-target="el-0">Element 0 </span>	
<span class="custom-element" data-target="el-1">Element 1 </span>	
<span class="custom-element" data-target="el-2">Element 2 </span>	
<span class="custom-element el-22  el-23" data-target="el-3">Element 3 </span>	
<span class="custom-element" data-target="el-4">Element 4 </span>	
<span class="custom-element el-22  el-23" data-target="el-5">Element 5 </span>	
<span class="custom-element" data-target="el-6">Element 6 </span>	
<span class="custom-element el-23" data-target="el-7">Element 7 </span>	
<span class="custom-element" data-target="el-8">Element 8 </span>	
<span class="custom-element" data-target="el-9">Element 9 </span>	

<p class="el-10">
Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
</p>
<p><span class="custom-element custom-el-drag" data-target="el-17">Drag Me</span></p>
<h2 class="timer">Timer</h2>
<span style="cursor:pointer" class="custom-element add-new-item-1">Element on page </span>	
<p class="el-11">
Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo.
</p>
<form>
	<input type="text">
	<input class="form-btn" type="submit">
</form>
<label class="custom-element" data-target="el-21"><input name="el-name-1" type="radio"></label>	
<label class="custom-element" data-target="el-22"><input name="el-name-1" type="radio"></label>	
<label class="custom-element" data-target="el-23"><input name="el-name-1" type="radio"></label>

<p class="el-12">
Nam libero tempore, cum soluta nobis est eligendi optio, cumque nihil impedit, quo minus id, quod maxime placeat, facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. 
</p>
<p class="el-15">
<img class="el-13" src="..tutorial/doc_files/images/slide_1.gif"> 
<img class="el-14" src="..tutorial/doc_files/images/slide_2.gif"> 
</p>

<button data-target="b-1">Button 1 </button>	


<p class="el-16">
Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
</p>

<input data-placeholder="Enter any text" class="checkEl_1 custom-element" type="text" value=""> 
<input type="button" class="checkEl_2 custom-element" value="Submit">	

</div>
	
		</div>
	</div>				
</div>

<!-- <link rel="stylesheet" href="tutorial/doc_files/css/prism.css"> -->
<!-- <script src="tutorial/doc_files/js/prism.js"></script> -->
</body>
</html>