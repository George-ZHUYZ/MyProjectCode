<?php
require_once dirname(__FILE__) . '/interface/homeSectionData.php';
require_once dirname(__FILE__) . '/interface/productDetailInterface.php';
?>





<div id="homePageContent">

	<div class="slide" id="slide1" data-slide="1" data-stellar-background-ratio="0.5">

		<div id="home_firstSection_background">



			<!-- Start Slider BODY section --> 

			<div id="wowslider-container1">

				<div class="ws_images" style="width:960px;height:360px"><ul>

						<?php
						$homeGallaryID = getHomeGallaryID();
						for ($i = 0; $i < count($homeGallaryID); $i++) {
							echo '<li><a href="?gallary&' . $homeGallaryID[$i][0] . '"><img src="'.$homeGallaryID[$i][1].'" width="960" height ="360" alt="" title="" id="wows1_0"/></a></li>';
						}
						?>

<!--						<li><a href="?gallary&2"><img src="/clients/www.kingdomtournz.com/image/homePage/Banner2.png"  width="960" height ="360" alt="" title="" id="wows1_3"/></a></li>-->
						<li><a href="?journey&au"><img src="/clients/www.kingdomtournz.com/image/homePage/Banner3.jpg" width="960" height ="360" alt="" title="" id="wows1_1"/></a></li>
						<li><a href="?journey&pacific"><img src="/clients/www.kingdomtournz.com/image/homePage/Banner4.jpg" width="960" height ="360" alt="" title="" id="wows1_2"/></a></li>



					</ul></div>

				<div class="ws_bullets"><div>

						<a href="#" title="">1</a>

						<a href="#" title="">2</a>

						<a href="#" title="">3</a>

						<a href="#" title="">4</a>

					</div></div>

				<div class="ws_shadow"></div>

			</div>	

			<script type="text/javascript" src="/clients/www.kingdomtournz.com/homeSlider/wowslider.js"></script>

			<script type="text/javascript" src="/clients/www.kingdomtournz.com/homeSlider/script.js"></script>

			<!-- End Slider BODY section -->

			<!--</table>-->



		</div>

	</div>





	<?php $nzHotResult = homeSectionData("nz"); ?>

	<div class="slide" id="slide2" data-slide="2" data-stellar-background-ratio="0.5">

		<div class="homePages">	





			<table class="table1" >

				<tr class="tr">

					<td class="td1">

						<div class="grid">

							<figure class="effect-oscar">



								<a href="?journey&nz"> 
									<img src="/clients/www.kingdomtournz.com/image/homePage/newzealand(250X524).png" alt="img14"/>

								</a>



								<figcaption>
									<a href="?journey&nz"> <h4 class="homepage_Section_firstPic">新西兰 </h4></a>
									<a href="?journey&nz"> 
										<p>新西兰位于太平洋西南部，是个岛屿国家，气候宜人、环境清新、风景优美、旅游胜地遍布、森林资源丰富、地表景观富变化 </p>

									</a>	

								</figcaption>	



							</figure>

						</div>

					</td>

					<td class="td2">

						<table class="table2 " >

							<tr class="tr_1">

								<td class="td_1">

									<div class="grid">

										<figure class="effect-ruby">

											<img src="<?php echo $nzHotResult[0][4] ?>" alt="img10"/>

											<figcaption>

												<?php echo '<a href="?product&' . $nzHotResult[0][0] . '">' ?>

												<h2><?php echo $nzHotResult[0][1]; ?> </h2>

												<h2> <?php echo "NZD " . $nzHotResult[0][3]; ?> </h2>

												<?php echo $nzHotResult[0][2]; ?>

												</a>

											</figcaption>			

										</figure>



									</div>

								</td>

								<td class="td_1">

									<div class="grid">

										<figure class="effect-ruby">

											<img src="<?php echo $nzHotResult[1][4] ?>" alt="img10"/>

											<figcaption>

												<?php echo '<a href="?product&' . $nzHotResult[1][0] . '">' ?>

												<h2><?php echo $nzHotResult[1][1]; ?> </h2>

												<h2> <?php echo "NZD " . $nzHotResult[1][3]; ?> </h2>

												<?php echo $nzHotResult[1][2]; ?>

												</a>

											</figcaption>			

										</figure>



									</div>

								</td>

							</tr>

							<tr class="tr_1">

								<td class="td_1">

									<div class="grid">

										<figure class="effect-ruby">

											<img src="<?php echo $nzHotResult[2][4] ?>" alt="img10"/>

											<figcaption>

												<?php echo '<a href="?product&' . $nzHotResult[2][0] . '">' ?>

												<h2><?php echo $nzHotResult[2][1]; ?> </h2>

												<h2> <?php echo "NZD " . $nzHotResult[2][3]; ?> </h2>

												<?php echo $nzHotResult[2][2]; ?>

												</a>

											</figcaption>			

										</figure>



									</div>

								</td>

								<td class="td_1">

									<div class="grid">

										<figure class="effect-ruby">

											<img src="<?php echo $nzHotResult[3][4] ?>" alt="img10"/>

											<figcaption>

												<?php echo '<a href="?product&' . $nzHotResult[3][0] . '">' ?>

												<h2><?php echo $nzHotResult[3][1]; ?> </h2>

												<h2> <?php echo "NZD " . $nzHotResult[3][3]; ?> </h2>

												<?php echo $nzHotResult[3][2]; ?>

												</a>

											</figcaption>			

										</figure>



									</div>

								</td>

							</tr>

						</table>

					</td>

				</tr>

			</table>



		</div>

	</div>





	<?php $aussieHotResult = homeSectionData("aussie"); ?>

	<div class="slide" id="slide3" data-slide="3" data-stellar-background-ratio="0.5">

		<div class="homePages">



			<table class="table1" >

				<tr class="tr">

					<td class="td1">

						<div class="grid">

							<figure class="effect-oscar">

								<a href="?journey&au"><img src="/clients/www.kingdomtournz.com/image/homePage/Australia(250X524).png" alt="img14"/>

								</a>



								<figcaption>
									<a href="?journey&au"><h4 class="homepage_Section_firstPic">澳洲 </h4></a>
									<a href="?journey&au">



										<p>澳大利亚既拥有可追溯到五万年前的丰富原住民历史，满富传奇色彩的拓荒英雄和开拓者 </p>
									</a>



								</figcaption>			

							</figure>

						</div>

					</td>

					<td class="td2">

						<table class="table2 " >

							<tr class="tr_1">

								<td class="td_1">

									<div class="grid">

										<figure class="effect-ruby">

											<img src="<?php echo $aussieHotResult[0][4] ?>" alt="img10"/>

											<figcaption>

												<?php echo '<a href="?product&' . $aussieHotResult[0][0] . '">' ?>

												<h2><?php echo $aussieHotResult[0][1]; ?> </h2>

												<h2> <?php echo "NZD " . $aussieHotResult[0][3]; ?> </h2>

												<?php echo $aussieHotResult[0][2]; ?>

												</a>

											</figcaption>

										</figure>



									</div>

								</td>

								<td class="td_1">

									<div class="grid">

										<figure class="effect-ruby">

											<img src="<?php echo $aussieHotResult[1][4] ?>" alt="img10"/>

											<figcaption>

												<?php echo '<a href="?product&' . $aussieHotResult[1][0] . '">' ?>

												<h2><?php echo $aussieHotResult[1][1]; ?> </h2>

												<h2> <?php echo "NZD " . $aussieHotResult[1][3]; ?> </h2>

												<?php echo $aussieHotResult[1][2]; ?>

												</a>

											</figcaption>			

										</figure>



									</div>

								</td>

							</tr>

							<tr class="tr_1">

								<td class="td_1">

									<div class="grid">

										<figure class="effect-ruby">

											<img src="<?php echo $aussieHotResult[2][4] ?>" alt="img10"/>

											<figcaption>

												<?php echo '<a href="?product&' . $aussieHotResult[2][0] . '">' ?>

												<h2><?php echo $aussieHotResult[2][1]; ?> </h2>

												<h2> <?php echo "NZD " . $aussieHotResult[2][3]; ?> </h2>

												<?php echo $aussieHotResult[2][2]; ?>

												</a>

											</figcaption>

										</figure>



									</div>

								</td>

								<td class="td_1">

									<div class="grid">

										<figure class="effect-ruby">

											<img src="<?php echo $aussieHotResult[3][4] ?>" alt="img10"/>

											<figcaption>

												<?php echo '<a href="?product&' . $aussieHotResult[3][0] . '">' ?>

												<h2><?php echo $aussieHotResult[3][1]; ?> </h2>

												<h2> <?php echo "NZD " . $aussieHotResult[3][3]; ?> </h2>

												<?php echo $aussieHotResult[3][2]; ?>

												</a>

											</figcaption>

										</figure>



									</div>

								</td>

							</tr>

						</table>

					</td>

				</tr>

			</table>



		</div>

	</div>





	<?php $pacificHotResult = homeSectionData("pacific"); ?>

	<div class="slide" id="slide4" data-slide="4" data-stellar-background-ratio="0.5">

		<div class="homePages">



			<table class="table1" >

				<tr class="tr">

					<td class="td1">

						<div class="grid">

							<figure class="effect-oscar">

								<a href="?journey&pacific"><img src="/clients/www.kingdomtournz.com/image/homePage/pacifica(250X524).png" alt="img14"/>

								</a>

								<figcaption>
									<a href="?journey&pacific"><h4 class="homepage_Section_firstPic">南太平洋岛国</h4></a>
									<a href="?journey&pacific">


										<p> 斐济、库克群岛、大溪地无疑是中国游客最为熟悉的。那里有世界知名的度假村，可以无拘无束地在海滩边晒晒太阳、吃海鲜、喝红酒 </p>

									</a>



								</figcaption>			

							</figure>

						</div>

					</td>

					<td class="td2">

						<table class="table2 " >

							<tr class="tr_1">

								<td class="td_1">

									<div class="grid">

										<figure class="effect-ruby">

											<img src="<?php echo $pacificHotResult[0][4] ?>" alt="img10"/>

											<figcaption>

												<?php echo '<a href="?product&' . $pacificHotResult[0][0] . '">' ?>

												<h2><?php echo $pacificHotResult[0][1]; ?> </h2>

												<h2> <?php echo "NZD " . $pacificHotResult[0][3]; ?> </h2>

												<?php echo $pacificHotResult[0][2]; ?>

												</a>

											</figcaption>		

										</figure>



									</div>

								</td>

								<td class="td_1">

									<div class="grid">

										<figure class="effect-ruby">

											<img src=" <?php echo $pacificHotResult[1][4] ?>" alt="img10"/>

											<figcaption>

												<?php echo '<a href="?product&' . $pacificHotResult[1][0] . '">' ?>

												<h2><?php echo $pacificHotResult[1][1]; ?> </h2>

												<h2> <?php echo "NZD " . $pacificHotResult[0][3]; ?> </h2>

												<?php echo $pacificHotResult[1][2]; ?>

												</a>

											</figcaption>	

										</figure>



									</div>

								</td>

							</tr>

							<tr class="tr_1">

								<td class="td_1">

									<div class="grid">

										<figure class="effect-ruby">

											<img src="<?php echo $pacificHotResult[2][4] ?>" alt="img10"/>

											<figcaption>

												<?php echo '<a href="?product&' . $pacificHotResult[2][0] . '">' ?>

												<h2><?php echo $pacificHotResult[2][1]; ?> </h2>

												<h2> <?php echo "NZD " . $pacificHotResult[2][3]; ?> </h2>

												<?php echo $pacificHotResult[2][2]; ?>

												</a>

											</figcaption>

										</figure>



									</div>

								</td>

								<td class="td_1">

									<div class="grid">

										<figure class="effect-ruby">

											<img src="<?php echo $pacificHotResult[3][4] ?>" alt="img10"/>

											<figcaption>

												<?php echo '<a href="?product&' . $pacificHotResult[3][0] . '">' ?>

												<h2><?php echo $pacificHotResult[3][1]; ?></h2>

												<h2><?php echo $pacificHotResult[3][3]; ?></h2>

												<?php echo $pacificHotResult[3][2]; ?>

												</a>

											</figcaption>

										</figure>



									</div>

								</td>

							</tr>

						</table>

					</td>

				</tr>

			</table>



		</div>

	</div>





</div>

