<html>
<head>
<title>Satire Interface</title>
<link rel="stylesheet" type="text/css" href="styles/index.css">
<link rel="stylesheet" type="text/css"
	href="styles/bootstrap-responsive.css">

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"
	type="text/javascript"></script>
<script src="scripts/pbl.js"></script>
<script src="scripts/bootstrap.js"></script>

<META NAME="Description" CONTENT="An online Error Analysis webapp. Determines first order error due to rounding and determines rigorous bounds on output.">

<META NAME="KeyWords" CONTENT="Python, Gelpia, first order error, abstraction, automatic differeentiation, reverse mode AD, logic, Arnab Das, Ganesh Gopalakrishnan, Tanmay Tirpankar">

</head>

<body>
	<!-- Header -->
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">

				<a class="brand" href="index.php">Satire</a>
				<div class="nav-collapse collapse">
					<ul class="nav">
						<li class="active"><a href="index.php">Satire Interface</a></li>
						<li><a href="https://github.com/arnabd88/Satire">Github Page</a>
						<li><a href="people.php">People</a></li>
						<li><a href="http://www.cs.utah.edu/formal_verification/">Gauss Group</a></li>
						<li><a href="http://www.utah.edu">The University Of Utah</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<!-- body -->
	<div class="container">
		<div class="hero-unit">
			<h2>This is the online interface for Satire, a first order error analysis tool written in Python.</h2>
			
			<h4 style="color:red;">Note: Although it will complete, please download the tool from github to run any program taking over 2 minutes.</h4>
			<div class="row">
				<div class="span5">
				<h3>ENTER YOUR PROGRAM HERE</h3>
				<textarea class="PBLFormulaArea">
				</textarea>
				</div>
				
				<div class="span5">
				<h3>PROGRAM OUTPUT</h3>
				<textarea class="PBLOutputArea">
				</textarea>
				</div>			
			</div>

			<div>
				<button class="btn btn-inverse" id="PBLPrevious">Prev</button>
				<button class="btn btn-inverse" id="PBLNext">Next</button>
				<button class="btn btn-info" id="convertToNNE">Start Error Analysis</button>
			</div>
			<div class="flagblock">
				<label for="AbstractionFlag">Abstraction</label>
				<input type="checkbox" id="AbstractionFlag" value="true">
				<br>
				<label class="flaglabel" for="AbstractionLowerBound">Lower Bound</label>
				<input type="text" id="AbstractionLowerBound" value="10">
				<br>
				<label class="flaglabel" for="AbstractionUpperBound">Upper Bound</label>
				<input type="text" id="AbstractionUpperBound" value="40">
			</div>
			<div class="flagblock">
				<label for="ParallelFlag">Parallel</label>
				<input type="checkbox" id="ParallelFlag" value="true">
			</div>
			<div class="flagblock">
				<label for="EmpiricalAnalysisFlag">Empirical Analysis</label>
				<input type="checkbox" id="EmpiricalAnalysisFlag" value="true">
				<br>	
				<label class="flaglabel" for="EmpiricalAnalysisRuns"># executions</label>
				<input type="text" id="EmpiricalAnalysisRuns" value="100">
			</div>
			<!-- About Satire --!>
			<a href="#myModal2" role="button" class="btn btn-primary" data-toggle="modal"><h3>About Satire</h3></a>

			<!-- Modal --!>
			<div id="myModal2" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-header">
                                	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">¡Á</button>
                                        <h2 id="myModalLabel2">About Satire</h2>
                                </div>
				<div class="modal-body">
					<p>
                				Satire is an error analysis tool for obtaining rigorous bounds on worst case floating point round-off errors. It takes in a straight line floating-point programs written in Satire FP format. Satire attains scalable and tight bounds through incremental analysis, abstraction and use of concrete and symbolic evaluation.
                			</p>
                			<br>

                			<p>
                				The next iteration of Satire, called Seesaw is currently in the works which is able to handle conditional computation graphs. Look forward to it.
                			</p>
                			<br>

                			<p>
                				This web interface currently shows off some of the functionality of Satire.
                			</p>
                			<br>
				</div>
				<div class="modal-footer">
                                        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                </div>
			</div>	
			<!-- Interface instructions -->
			<a href="#myModal" role="button" class="btn btn-primary" data-toggle="modal"><h3>Interface instructions</h3></a>
				
			<!-- Modal -->
			<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 				<div class="modal-header">
    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">¡Á</button>
   					<h2 id="myModalLabel">Interface instructions</h2>
	  			</div>
	  				
	 			<div class="modal-body">
		 			<p>
						You may either scroll through the examples using the "Prev" and "Next" buttons or enter your own floating point program in the ENTER YOUR PROGRAM box.
						This interface currently demonstrates 3 features of Satire:
					<ul>
						<li>Abstraction</li>
						<p>
							This can be turned on or off by the checkbox provided. Please provide the depth window (lower and upper bound) where abstraction will be performed in the AST. Default values are 10 and 40.
						</p>
						<li>Parallel Execution</li>
						<p>
						This is controlled by the corresponding checkbox provided. The program builds a worklist for calls to gelpia. If the size of this worklist exceeds the threshold, all gelpia calls are performed in parallel.
						</p>
						<li>Empirical Analysis</li>
						This feature builds a C++ program to perform shadow value execution of the program with single and double precision value where double precision values act as proxy to real values. The C++ program randomly selects values for each variable from the input intervals and executes the program. The # executions text box allows you to decide how many times the program should be executed since each time different set of values will be selected.  The output is seen in the Empirical Error Analysis Section. This will allow to verify if the results from Satire are correct as Satire always provides the worst case error bound.
					</ul>

					Although Satire has other features, the online interface allows you to simply calculate first order error and determine bound on output for now.
					The syntax was made to be robust and intuitive. See the examples to get an idea. The exact language specification can be seen here.</p>
	 				
	 			<p>
	 			Lexing is accomplished using the <a href="https://sly.readthedocs.io/en/latest/sly.html">SLY</a> library 
				<br>
	 			</p>
	    			<p>
				Satire has a custom parser for parsing Satire Floating Point programs. 
				<br>
				</p>

	  			</div>
	  				
	  			<div class="modal-footer">
	    				<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
	  			</div>
			</div>
				
			<!--Language Spec -->
			<a href="#myModal1" role="button" class="btn btn-warning" data-toggle="modal"><h3>Language Spec</h3></a>
				
			<!-- Modal -->
			<div id="myModal1" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 				<div class="modal-header">
    					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">¡Á</button>
   					<h2 id="myModalLabel">Language Spec</h2>
	  			</div>
	  				
	 			<div class="modal-body">
		 		<p>
				Satire can only handle straight line programs. As such any loops need to be manually unrolled.
				A short summary of the language is as follows:<br>
				Variables can be named anything alpha numeric. They must be followed by a floating type format except for in the OUTPUT section. Currently supported types are ??. Each statement must be terminated by a semicolon. Satire input has 3 sections namely INPUTS, OUTPUTS and EXPRS.<br> 
				<b>INPUTS:</b> You have to declare all input variables in this section along with its type and interval. <br><br>
					
				<b>OUTPUTS:</b> You can declare any variables that you want to find an error bound for. More than one variables accepted. Each variable to be separated by a semicolon.<br>
					
				<b>EXPRS:</b> You can put in all arithmetic expressions in this section. The expressions can contain trigonometric functions and log operator. <br>
					
				<b>Comments :</b> denoted with #<br><br>

	  			</div>
	  				
	  			<div class="modal-footer">
	    			<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
	  			</div>
			</div>
		</div>
		
		<footer>		
			<p><strong>Please email questions, comments or bugs to Tanmay Tirpankar<br>
			ALSO IF YOU FIND THIS SITE USEFUL PLEASE LET US KNOW! YOUR FEEDBACK HELPS US TO IMPROVE AND MAINTAIN THIS SITE<br>
			tirpankartanmay@gmail.com</strong></p>		
		</footer>
	</div>

</body>
</html>
