<div class="headerContainer">

	<div class="header">
		
		<a href="/">
			<div id="logo">	
			</div>
		</a>
	
		<div class="link">

			<ul class="contact">

				<li><a href="/" ><?php echo $lang['MENU_HOME'] ?></a></li>
				<li><a href="#"> | </a></li>
				<li><a href="?ABOUTUS"><?php echo $lang['MENU_ABOUT_US'] ?></a></li>

			</ul>

                </div>
			
		<!--<div class="translate">

				<ul class="language">

                           		<a href="?lang=en"><img src="http://image0.tangren.co.nz/goto/www.eckomautoparts.com/baseimage/flag_nz.jpg" width="24" height="18"></a>
                           		<a href="?lang=ch"><img src="http://image0.tangren.co.nz/goto/www.eckomautoparts.com/baseimage/flag_cn.jpg" width="24" height="18"></a>

                       		</ul>

		</div>-->

	</div>
			

	<div class="navContainer">

		<ul id="nav">

			<?php
				require_once dirname(__FILE__) . '/interface/navigationBar.php';
				$mainType=array("PRODUCTS","SOLUTIONS","SOFTWARETOOLS");
				loadMainType_Nav($mainType);
			?>

			<li class="memu">
				<a href="?SUPPORT">
					<?php echo $lang['MENU_SUPPORT'] ?>
				</a>
			</li>
		
			<li class="search">
				<form onsubmit="changeTitleToSearch()">                    

				<!--<form method="post" id="searchform" action="?SEARCHRESULT">
                        		<input id="s" name="s" type="text" value="<?php echo $lang['MENU_SEARCH'] ?>" 
                               			class="text_input" 
                               			onblur="if (this.value == '')
							{
								this.value = ' <?php echo $lang['MENU_SEARCH'] ?>';
								}"
						onfocus="if ((this.value).length > 0) {
							this.value = ''
						}">
					<input name="submit" type="submit" value="">-->

					<input type="text" id="st-search-input" class="st-search-input"  />
                    		</form>

			</li>

		</ul>

	</div>

</div>