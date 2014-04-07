		</div> <!--! end of #page -->
    
    <!-- JavaScript at the bottom for fast page loading -->
    
    <!-- Grab local jQuery -->
    <script src="js/libs/jquery-1.10.2.min.js"></script>
    
    <!-- scripts concatenated and minified via ant build script-->
    <script type="text/javascript" src="js/plugins.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <!-- end scripts-->
    
    <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
       chromium.org/developers/how-tos/chrome-frame-getting-started -->
    <!--[if lt IE 7 ]>
    <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
    <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
    <![endif]-->
	
</body>
</html>
<?php if(isset($database)) { $database->close_connection(); } ?>