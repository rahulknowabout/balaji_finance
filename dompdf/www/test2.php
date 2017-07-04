<?php
session_start();
header("Cache-control: private");
require_once("../dompdf_config.inc.php");

//require_once("http://code.google.com/p/dompdf/source/browse/branches/dompdf_0-6_test/dompdf/dompdf_config.inc.php");

$html ='
<div style="display:block" class="jcautomation_form" id="jcautomation">
	<table width="100%" cellspacing="2px" cellpadding="0" border="0">
	<tbody>
		<tr>
			<td align="center" colspan="2" class="thnxmsg">
				<table width="100%">
<tbody><tr>
	<td>
		<img src="http://my.virtualtone.net/templates/rt_modulus/images/logo/dark/logo.png">
	</td>
</tr>
</tbody></table>			</td>
		</tr>	
				<tr>
					<th valign="top" align="left" style="color:#008EC4;background-color:#F1F1F1" colspan="2" class="jctblheading">CUSTOMER INFORMATION</th>
				</tr>
					<tr>
					
							<td valign="top" class="jclabel">Name</td>
					
							<td valign="top" class="jcfiled">
							
								devteam test53								
								
										
								</td>
					
					</tr>
					<tr>
					
							<td valign="top" class="jclabel">Company</td>
					
							<td valign="top" class="jcfiled">
							
								devteamtest53								
								
										
								</td>
					
					</tr>
					<tr>
					
							<td valign="top" class="jclabel">Email</td>
					
							<td valign="top" class="jcfiled">
							
								devteamtest53@mailinator.com								
								
										
								</td>
					
					</tr>
					<tr>
					
							<td valign="top" class="jclabel">Address 1</td>
					
							<td valign="top" class="jcfiled">
							
								test address1								
								
										
								</td>
					
					</tr>
					<tr>
					
							<td valign="top" class="jclabel">City</td>
					
							<td valign="top" class="jcfiled">
							
								Onenta								
								
										
								</td>
					
					</tr>
					<tr>
					
							<td valign="top" class="jclabel">State/Province/Region</td>
					
							<td valign="top" class="jcfiled">
							
								New York								
								
										
								</td>
					
					</tr>
					<tr>
					
							<td valign="top" class="jclabel">Zip/Postal Code</td>
					
							<td valign="top" class="jcfiled">
							
								13820								
								
										
								</td>
					
					</tr>
					<tr>
					
							<td valign="top" class="jclabel">Country</td>
					
							<td valign="top" class="jcfiled">
							
								United States								
								
										
								</td>
					
					</tr>
					<tr>
					
							<td valign="top" class="jclabel">Phone</td>
					
							<td valign="top" class="jcfiled">
							
								4321412563								
								
										
								</td>
					
					</tr>
				<tr>
					<th valign="top" align="left" style="color:#008EC4;background-color:#F1F1F1" colspan="2" class="jctblheading">PACKAGE INFORMATION</th>
				</tr>
					<tr>
					
							<td valign="top" colspan="2" class="jcfiled">
							
								Small Business (2-10 Phones)<br><p class="jc_parameter_content"></p><ul>
<li>10 lines/trunks
</li>
<li>Up to 10 Devices Connected</li>
<li>10 DID (Direct-In-Dialing) number - new or keep your own</li>
<li>Toll-free number available</li>
<li>One voice conference room</li>
<li>Web email hosting with Barracuda spam filtering</li>
</ul><p></p>								
								
										
								</td>
					
					</tr>
					<tr>
					
							<td valign="top" class="jclabel">Phone Numbers/DID Within Package Limit</td>
					
							<td valign="top" class="jcfiled">
							
								1								
								
										
								</td>
					
					</tr>
					<tr>
					
							<td valign="top" class="jclabel">Phone Numbers/DID Outside Package Limit</td>
					
							<td valign="top" class="jcfiled">
							
								1								
								
										
								</td>
					
					</tr>
					<tr>
					
							<td valign="top" class="jclabel">Additional Phone Lines/Trunks</td>
					
							<td valign="top" class="jcfiled">
							
								1								
								
										
								</td>
					
					</tr>
				<tr>
					<th valign="top" align="left" style="color:#008EC4;background-color:#F1F1F1" colspan="2" class="jctblheading">HARDWARE INFORMATION</th>
				</tr>
					<tr>
					
							<td valign="top" class="jclabel">Would you like the promo package?</td>
					
							<td valign="top" class="jcfiled">
							
								Yes								
								
										
								</td>
					
					</tr>
					<tr>
					
							<td valign="top" class="jclabel">Fax Adapter</td>
					
							<td valign="top" class="jcfiled">
							
								Yes								
								
										
								</td>
					
					</tr>
					<tr>
					
							<td valign="top" class="jclabel">Quantity</td>
					
							<td valign="top" class="jcfiled">
							
								1								
								
										
								</td>
					
					</tr>
				<tr>
					<th valign="top" align="left" style="color:#008EC4;background-color:#F1F1F1" colspan="2" class="jctblheading">SPECIAL NOTES</th>
				</tr>
					<tr>
					
							<td valign="top" class="jclabel">Shipping</td>
					
							<td valign="top" class="jcfiled">
							
								Ground								
								
										
								</td>
					
					</tr>
					<tr>
					
							<td valign="top" class="jclabel">Financing</td>
					
							<td valign="top" class="jcfiled">
							
								Yes								
								
										
								</td>
					
					</tr>
					<tr>
					
							<td valign="top" colspan="2" class="jcfiled">
							
								devteam test PDF...								
								
										
								</td>
					
					</tr>
<tr><td colspan="2"><table width="100%" cellspacing="2px" cellpadding="0" border="0" class="pcat">
			<tbody><tr><th align="left" style="color:#008EC4;background-color:#F1F1F1" class="jctblheading cname" colspan="5"><b>Equipment</b></th></tr>
			<tr class="trtheading"><td width="60%" class="theading" colspan="2">Description</td><td class="theading">Qty</td><td class="theading">Price</td><td class="theading">Ext. Price</td></tr>
							<tr>
					<td valign="top" style="height:160px;width:150px" class="jcprod_name">
					<img width="150px" height="130.4347826087px" border="0" src="/images/stories/virtuemart/product/670.png"><br>
					VTone Polycom IP 670</td>
					<td width="60%" valign="top" class="jcprod_desc">SoundPoint IP 670 is a premium, application-enabled desktop SIP phone with a high-performance color display, Polycom\'s revolutionary HD Voice technology and Gigabit Ethernet (GigE) connectivity. Includes 48 volt power supply<br>  -1 Year VTone Support Included<br>  -1 Year Manufacture Warranty Included<br>  - Provisioning and Remote Setup Included</td>
					<td valign="top" class="jcprod_qty">
										1										</td>
					<td valign="top" class="jcprod_prc">$495.03</td>
					<td valign="top" class="jcprod_exprc"><span class="jcprod_sexprc">$495.03</span></td>				</tr>
						<tr>
					<td valign="top" style="height:160px;width:150px" class="jcprod_name">
					<img width="150px" height="150px" border="0" src="/images/stories/virtuemart/product/extra.jpg"><br>
					VTone Panasonic SIP Handset</td>
					<td width="60%" valign="top" class="jcprod_desc">Panasonic TGA50 Cordless SIP Handset<br>  -1 Year VTone Support Included<br>  - Provisioning Included</td>
					<td valign="top" class="jcprod_qty">
										1										</td>
					<td valign="top" class="jcprod_prc">$109.00</td>
					<td valign="top" class="jcprod_exprc"><span class="jcprod_sexprc">$109.00</span></td>				</tr>
						<tr>
					<td valign="top" style="height:160px;width:150px" class="jcprod_name">
					<img width="150px" height="101.25px" border="0" src="/images/stories/virtuemart/product/vtone-panasonic-sip-phone-base_80x.png"><br>
					VTone Panasonic SIP Base KX500</td>
					<td width="60%" valign="top" class="jcprod_desc">Panasonic TGP500 Base Unit w/ 1 Handset(TPA50).<br>  - Base supports up to 6 DECT handsets.<br>  -1 Year VTone Support Included<br>  - Provisioning Included</td>
					<td valign="top" class="jcprod_qty">
										1										</td>
					<td valign="top" class="jcprod_prc">$240.00</td>
					<td valign="top" class="jcprod_exprc"><span class="jcprod_sexprc">$240.00</span></td>				</tr>
						<tr>
					<td valign="top" style="height:160px;width:150px" class="jcprod_name">
					<img width="150px" height="150px" border="0" src="/images/stories/virtuemart/product/5000.jpg"><br>
					VTone Polycom IP 5000</td>
					<td width="60%" valign="top" class="jcprod_desc">SoundStation IP5000 Conference phone. HD Voice, up to 6 participants, echo cancellation, expandable, 3x 360deg microphones, 802.3af PoE. Include Power supply.</td>
					<td valign="top" class="jcprod_qty">
										1										</td>
					<td valign="top" class="jcprod_prc">$596.84</td>
					<td valign="top" class="jcprod_exprc"><span class="jcprod_sexprc">$596.84</span></td>				</tr>
						<tr>
					<td valign="top" style="height:160px;width:150px" class="jcprod_name">
					<img width="150px" height="130.4347826087px" border="0" src="/images/stories/virtuemart/product/5608.png"><br>
					VTone Polycom IP 560</td>
					<td width="60%" valign="top" class="jcprod_desc">VTone Polycom IP 560 wPS (48 Volt)<br>The SoundPoint IP 560 desktop phone with GigE, a four-line SIP phone that delivers calls of unprecedented richness and clarity and supports a comprehensive range of cutting-edge features to future-proof your investment in network infrastructure.  It is ideal for professionals and managers with demanding collaborative communication needs.</td>
					<td valign="top" class="jcprod_qty">
										1										</td>
					<td valign="top" class="jcprod_prc">$372.09</td>
					<td valign="top" class="jcprod_exprc"><span class="jcprod_sexprc">$372.09</span></td>				</tr>
						<tr>
					<td valign="top" style="height:160px;width:150px" class="jcprod_name">
					<img width="150px" height="104.16666666667px" border="0" src="/images/stories/virtuemart/product/vvx500_180x1235.jpg"><br>
					VTone Polycom VVX 500 Phone</td>
					<td width="60%" valign="top" class="jcprod_desc">The VVX 500 is a Performance Business Media phone with the world\'s best high definition audio, video playback, and business application integration delivering best-in-class desktop productivity and Unified Communications for the knowledge worker (the busy professional).<br><br>Maximize Productivity:<br>Designed for a broad range of environments from small and medium businesses to large enterprises, the VVX 500 performance business media phone improves productivity, by complimenting the office applications on the user\'s computer. Users benefit from such capabilities as viewing and managing their Exchange calendars and contacts on the phone and receive meeting reminders while still having access to their corporate directory&mdash;and all while waiting for their PCs to boot. Users can also extend their PC desktop to include the VVX 500 phone\'s screen, enabling simplified interactions and dialing using their PC\'s mouse and keyboard. Training and multipoint communication applications are complemented by the VVX 500 video playback capability for streaming content.</td>
					<td valign="top" class="jcprod_qty">
										1										</td>
					<td valign="top" class="jcprod_prc">$339.99</td>
					<td valign="top" class="jcprod_exprc"><span class="jcprod_sexprc">$339.99</span></td>				</tr>
						<tr>
					<td valign="top" style="height:160px;width:150px" class="jcprod_name">
					<img width="150px" height="124.16666666667px" border="0" src="/images/stories/virtuemart/product/vvx1500_180x149.jpg"><br>
					VTone Polycom VVX 1500 D</td>
					<td width="60%" valign="top" class="jcprod_desc">Polycom VVX 1500 D dual stack &amp; 48volt PS<br><br>VVX 1500 D dual stack bundle with and 48 volt power supply. (SIP&amp;H.323) business media phone with video capability and HD Voice. <br><br>1x Polycom - VVX 1500 D Dual Stack (SIP&amp;H.323) Business Media Phone w- Video and HD Voice (2200-18064-025)<br>1x Polycom - Premier VVX 1500D 1 Year (4870-00708-112)  (maintenance)<br>1x Polycom - Power Supply 48 Volt for IP670, VVX 500 and VVX 1500<br>(2200-17670-001)<br><br>The Polycom VVX 1500 D dual stack business media phone unifies video, voice and applications capabilities in a simple-to-use personal communication solution. With its unique touch screen interface, the VVX 1500 D makes video calls as simple as using a desktop phone. Its large display and ease of use make the VVX 1500 D an ideal productivity tool for today\'s busy executives and professionals, whether they are in office, retail, professional services, or healthcare environments.<br><br>One-Touch Personal Video Device<br>The Polycom VVX 1500 D includes an integrated camera and delivers easy and instant business-grade video calling with a simple touch of the screen. With native H.323 support, it connects easily with all standards-based H.323 video conferencing and telepresence systems, such as the Polycom HDX(tm) series, and real-time media conference platforms, such as the Polycom RMX series, enabling mass adoption of business-grade video in the enterprise. The VVX 1500 D has multiple adjustable elements including camera tilt, base height and screen angle to suit the environment and a user\'s preferences.<br><br>Business Information At-a-Glance<br>The Polycom VVX 1500 D business media phone features an open API and WebKit-based full browser that enable third-party developers to create applications that integrate the VVX 1500 D with business systems such as UC, customer relationship management (CRM), and other vertical business applications. The VVX 1500 D comes with a Web service called Polycom My Info Portal, through which customers can select to receive personalized Web content, such as stock prices, weather, and news.<br><br>Feature-Rich Phone* with Polycom HD Voice<br>The Polycom VVX 1500 D is equipped with all of the capabilities of a full featured SIP IP phone including: six lines, Polycom HD Voice technology, a Gigabit Ethernet switch that supports PoE, and a host of voice telephony functions. These features can be accessed via the buttons on the front of the phone or by simply touching the large color display. Use of the voice telephony functionality requires integration with a Polycom certified SIP call control platform.</td>
					<td valign="top" class="jcprod_qty">
										1										</td>
					<td valign="top" class="jcprod_prc">$1,217.89</td>
					<td valign="top" class="jcprod_exprc"><span class="jcprod_sexprc">$1,217.89</span></td>				</tr>
						<tr>
					<td valign="top" style="height:160px;width:150px" class="jcprod_name">
					<img width="150px" height="150px" border="0" src="/images/stories/virtuemart/product/ip335-80x80.png"><br>
					VTone Polycom IP 321</td>
					<td width="60%" valign="top" class="jcprod_desc">SoundPoint IP 321, 2-line SIP desktop phone with 10/100 LAN single port and PoE support.<br>  -1 Year VTone Support Included<br>  -1 Year Manufacture Warranty Included<br>  - Provisioning and Remote Setup Included</td>
					<td valign="top" class="jcprod_qty">
										1										</td>
					<td valign="top" class="jcprod_prc">$130.12</td>
					<td valign="top" class="jcprod_exprc"><span class="jcprod_sexprc">$130.12</span></td>				</tr>
						<tr>
					<td valign="top" style="height:160px;width:150px" class="jcprod_name">
					<img width="150px" height="150px" border="0" src="/images/stories/virtuemart/product/polycom-exp-module-sm6.jpg"><br>
					VTone Polycom 650 Expan Mod</td>
					<td width="60%" valign="top" class="jcprod_desc">Backlit expansion module for SoundPoint IP 650 HD phones, up to three expansion modules per 650 phone</td>
					<td valign="top" class="jcprod_qty">
										1										</td>
					<td valign="top" class="jcprod_prc">$278.00</td>
					<td valign="top" class="jcprod_exprc"><span class="jcprod_sexprc">$278.00</span></td>				</tr>
						<tr>
					<td valign="top" style="height:160px;width:150px" class="jcprod_name">
					<img width="150px" height="120px" border="0" src="/images/stories/virtuemart/product/550.jpg"><br>
					VTone Polycom IP 550</td>
					<td width="60%" valign="top" class="jcprod_desc"><p>SoundPoint IP550 SIP 4-Line IP desktop phone. With HD Voice, Built in PoE, Microbroswer &amp; Backlit display includes power supply.<br> -1 Year VTone Support Included<br> -1 Year Manufacture Warranty Included<br> - Provisioning and Remote Setup Included</p></td>
					<td valign="top" class="jcprod_qty">
										1										</td>
					<td valign="top" class="jcprod_prc">$292.68</td>
					<td valign="top" class="jcprod_exprc"><span class="jcprod_sexprc">$292.68</span></td>				</tr>
						<tr>
					<td valign="top" style="height:160px;width:150px" class="jcprod_name">
					<img width="150px" height="120px" border="0" src="/images/stories/virtuemart/product/polycom_ip_650-sm1.jpg"><br>
					VTone Polycom IP 650</td>
					<td width="60%" valign="top" class="jcprod_desc"><p>SoundPoint IP650 6-line IP desktop phone with PoE support. Backlight display, HD Audio, USB port and support for 601 EXP. Ships with universal power supply<br> -1 Year VTone Support Included<br> -1 Year Manufacture Warranty Included<br> - Provisioning and Remote Setup Included</p></td>
					<td valign="top" class="jcprod_qty">
										1										</td>
					<td valign="top" class="jcprod_prc">$355.25</td>
					<td valign="top" class="jcprod_exprc"><span class="jcprod_sexprc">$355.25</span></td>				</tr>
						<tr>
					<td valign="top" style="height:160px;width:150px" class="jcprod_name">
					<img width="150px" height="130.4347826087px" border="0" src="/images/stories/virtuemart/product/ip6000.png"><br>
					VTone Polycom IP 6000</td>
					<td width="60%" valign="top" class="jcprod_desc"><p>SoundStation IP6000 Conference phone. AC pwr or 802.3af Power over Ethernet. Incl 100-240V power supply, 25 ft/6m Cat5 shielded Ethernet cable; Pwr Insert Cable. <br> -1 Year VTone Support Included<br> -1 Year Manufacture Warranty Included<br> - Provisioning and Remote Setup Included</p></td>
					<td valign="top" class="jcprod_qty">
										1										</td>
					<td valign="top" class="jcprod_prc">$799.62</td>
					<td valign="top" class="jcprod_exprc"><span class="jcprod_sexprc">$799.62</span></td>				</tr>
						<tr>
					<td valign="top" style="height:160px;width:150px" class="jcprod_name">
					<img width="150px" height="135px" border="0" src="/images/stories/virtuemart/product/450.jpg"><br>
					VTone Polycom IP 450</td>
					<td width="60%" valign="top" class="jcprod_desc">SoundPoint IP 450, 3 line, XHTML micro-browser, HD voice, POE, backlit grayscale 256x116 LCD.  Comes with 24V power supply.<br>  -1 Year VTone Support Included<br>  -1 Year Manufacture Warranty Included<br>  - Provisioning and Remote Setup Included</td>
					<td valign="top" class="jcprod_qty">
										1										</td>
					<td valign="top" class="jcprod_prc">$260.70</td>
					<td valign="top" class="jcprod_exprc"><span class="jcprod_sexprc">$260.70</span></td>				</tr>
						<tr>
					<td valign="top" style="height:160px;width:150px" class="jcprod_name">
					<img width="150px" height="140px" border="0" src="/images/stories/virtuemart/product/331.jpg"><br>
					VTone Polycom IP 331</td>
					<td width="60%" valign="top" class="jcprod_desc"><p>SoundPoint IP 331, 2-line SIP desktop phone with dual 10/100 Ethernet port( one for PC ) and PoE support and 24 volt AC power supply<br> -1 Year VTone Support Included<br> -1 Year Manufacture Warranty Included<br> - Provisioning and Remote Setup Included</p></td>
					<td valign="top" class="jcprod_qty">
										1										</td>
					<td valign="top" class="jcprod_prc">$137.53</td>
					<td valign="top" class="jcprod_exprc"><span class="jcprod_sexprc">$137.53</span></td>				</tr>
						<tr>
					<td valign="top" style="height:160px;width:150px" class="jcprod_name">
					<img width="150px" height="150px" border="0" src="/images/stories/virtuemart/product/ip335-sm1.jpg"><br>
					VTone Polycom IP 335</td>
					<td width="60%" valign="top" class="jcprod_desc">SoundPoint IP 335 with power supply, 2-line SIP desktop phone with HDVoice, integrated 2-port 10/100 Ethernet switch and PoE support.<br>  -1 Year VTone Support Included<br>  -1 Year Manufacture Warranty Included<br>  - Provisioning and Remote Setup Included</td>
					<td valign="top" class="jcprod_qty">
										1										</td>
					<td valign="top" class="jcprod_prc">$177.71</td>
					<td valign="top" class="jcprod_exprc"><span class="jcprod_sexprc">$177.71</span></td>				</tr>
						<tr>
					<td valign="top" style="height:160px;width:150px" class="jcprod_name">
					<img width="150px" height="130.4347826087px" border="0" src="/images/stories/virtuemart/product/ss_ip7000_small.png"><br>
					VTone Polycom IP 7000</td>
					<td width="60%" valign="top" class="jcprod_desc"><p>SoundStation IP 7000 (HD) conference phone. AC pwr or 802.3af Power over Ethernet. Incl 100-240V power supply, 25 ft/6m Cat5 shielded Ethernet cable; Pwr Insert Cable. Expandable. <br> -1 Year VTone Support Included<br> -1 Year Manufacture Warranty Included<br> - Provisioning and Remote Setup Included</p></td>
					<td valign="top" class="jcprod_qty">
										1										</td>
					<td valign="top" class="jcprod_prc">$1,123.19</td>
					<td valign="top" class="jcprod_exprc"><span class="jcprod_sexprc">$1,123.19</span></td>				</tr>
						<tr>
					<td valign="top" style="height:160px;width:150px" class="jcprod_name">
					<img width="150px" height="105.22388059701px" border="0" src="/images/stories/virtuemart/product/images.jpg"><br>
					VTone Polycom VVX 600 Phone</td>
					<td width="60%" valign="top" class="jcprod_desc">Polycom VVX 600 16-line Business Media Phone with built-in Bluetooth and HD Voice - Includes Power Supply<br>The Polycom VVX 600 phone is built for executives and managers who need a powerful, yet intuitive, expandable office phone that helps them stay connected to the organizations they lead. Building on the behavior common to smartphones and tablets, the intuitive gesture-based, multi-touch user interface of the VVX 600 phone makes navigation easy and requires minimal training. Combining its ergonomic design with Polycom HD Voice quality and a large, high resolution color, multi-touch screen, the VVX 600 is ideal for busy managers.</td>
					<td valign="top" class="jcprod_qty">
										1										</td>
					<td valign="top" class="jcprod_prc">$402.23</td>
					<td valign="top" class="jcprod_exprc"><span class="jcprod_sexprc">$402.23</span></td>				</tr>
						<tr>
					<td valign="top" style="height:160px;width:150px" class="jcprod_name">
					<img width="150px" height="124px" border="0" src="/images/stories/virtuemart/product/vtlogo_80x8073.png"><br>
					Shipping Ground</td>
					<td width="60%" valign="top" class="jcprod_desc">Shipping Ground Service (To be Determined)</td>
					<td valign="top" class="jcprod_qty">
										1										</td>
					<td valign="top" class="jcprod_prc">$0.00</td>
					<td valign="top" class="jcprod_exprc"><span class="jcprod_sexprc">$0.00</span></td>				</tr>
						<tr>
					<td valign="top" style="height:160px;width:150px" class="jcprod_name">
					<img width="150px" height="124px" border="0" src="/images/stories/virtuemart/product/vtlogo_80x80619.png"><br>
					VTone PAP2T</td>
					<td width="60%" valign="top" class="jcprod_desc">VTone 2 Port Adapter<br>(for Fax Machines or cordless phones)<br>-1 Year VTone Support Included<br>- Provisioning Included</td>
					<td valign="top" class="jcprod_qty">
										1										</td>
					<td valign="top" class="jcprod_prc">$85.55</td>
					<td valign="top" class="jcprod_exprc"><span class="jcprod_sexprc">$85.55</span></td>				</tr>
						<tr>
					<td valign="top" style="height:160px;width:150px" class="jcprod_name">
					<img width="150px" height="124px" border="0" src="/images/stories/virtuemart/product/vtlogo_80x807.png"><br>
					VTONE 2013 Q1 Promo Package</td>
					<td width="60%" valign="top" class="jcprod_desc">VTONE 2013 Q1 Promo Package <br>Purchase (5) Polycom IP 450 Phones w/PS <br>Receive (1) Polycom VVX 600 16-line Business Media Phone w/PS and<br>Receive (1) Free Polycom VVX USB Camera for VVX 500/600 Business Media Phones<br><br>*Cancelling service with VirtualTone before the one year contract expires results in the client paying MSRP price for the (1) Polycom VVX USB Camera for VVX 500/600 Business Media Phones ($139.00 USB Cam MSRP) (1) Polycom VVX 600 16-line Business Media Phone w/PS ($509.00 VVX 600 MSRP) and pay for the remainder of the contracts obligation.<br><br>* Purchase a minimum of (5) Polycom IP 450 Desktop Phones.($260.70 x 5 = $1303.50) <br>* Authorize a minimum (1) year contract with VirtualTone</td>
					<td valign="top" class="jcprod_qty">
										1										</td>
					<td valign="top" class="jcprod_prc">$1,303.50</td>
					<td valign="top" class="jcprod_exprc"><span class="jcprod_sexprc">$1,303.50</span></td>				</tr>
		<tr class="trfoot"><td align="right" class="tfoot" colspan="3">Equipment Sub Total</td><td align="right" class="tfoot" colspan="2">$8,716.92</td></tr></tbody></table></td></tr><tr><td colspan="2"><table width="100%" cellspacing="2px" cellpadding="0" border="0" class="pcat">
			<tbody><tr><th align="left" style="color:#008EC4;background-color:#F1F1F1" class="jctblheading cname" colspan="5"><b>Monthly</b></th></tr>
			<tr class="trtheading"><td width="60%" class="theading" colspan="2">Description</td><td class="theading">Qty</td><td class="theading">Price</td><td class="theading">Ext. Price</td></tr>
							<tr>
					<td valign="top" style="height:160px;width:150px" class="jcprod_name">
					<img width="150px" height="124px" border="0" src="/images/stories/virtuemart/product/vtlogo_80x80567.png"><br>
					VTone Outgoing LD Charges</td>
					<td width="60%" valign="top" class="jcprod_desc">Outgoing LD Charges Per Minute</td>
					<td valign="top" class="jcprod_qty">
										0										</td>
					<td valign="top" class="jcprod_prc">$0.02</td>
					<td valign="top" class="jcprod_exprc"><span class="jcprod_sexprc">$0.00</span></td>				</tr>
						<tr>
					<td valign="top" style="height:160px;width:150px" class="jcprod_name">
					<img width="150px" height="124px" border="0" src="/images/stories/virtuemart/product/vtlogo_80x806.png"><br>
					VTone 800 Incoming LD Charges</td>
					<td width="60%" valign="top" class="jcprod_desc">800 Incoming LD Charges Per Minute</td>
					<td valign="top" class="jcprod_qty">
										0										</td>
					<td valign="top" class="jcprod_prc">$0.03</td>
					<td valign="top" class="jcprod_exprc"><span class="jcprod_sexprc">$0.00</span></td>				</tr>
						<tr>
					<td valign="top" style="height:160px;width:150px" class="jcprod_name">
					<img width="150px" height="124px" border="0" src="/images/stories/virtuemart/product/vtlogo_80x803693.png"><br>
					VTone SB Partner (MRC)</td>
					<td width="60%" valign="top" class="jcprod_desc">VirtualTone Small Business Phone System and Service - (Monthly Charges)<br>-10 Trunks (Phone Lines) with 10 DIDs (Phone Numbers),<br>-10 Devices (i.e. Video, Hard &amp; Soft Phones, Fax Adapters, Paging Systems, etc...)<br>-Unlimited Inbound &amp; Local Outbound Dialing<br>-Unlimited Extensions<br>-1 Web/Audio Conference Room(Included)<br>-VTone WEB/EMAIL Hosting Package<br>-VirtualTone SideBar2 Heads Up Display License Includes<br>- Heads Up Panel<br>- Chat Client<br>- Voicemail Controls</td>
					<td valign="top" class="jcprod_qty">
										1										</td>
					<td valign="top" class="jcprod_prc">$279.00</td>
					<td valign="top" class="jcprod_exprc"><span class="jcprod_sexprc">$279.00</span></td>				</tr>
						<tr>
					<td valign="top" style="height:160px;width:150px" class="jcprod_name">
					<img width="150px" height="124px" border="0" src="/images/stories/virtuemart/product/vtlogo_80x8085.png"><br>
					VTone Additional Trunk (MRC)</td>
					<td width="60%" valign="top" class="jcprod_desc">VTone Additional Trunk - (Monthly Reoccurring Charges)</td>
					<td valign="top" class="jcprod_qty">
										1										</td>
					<td valign="top" class="jcprod_prc">$24.95</td>
					<td valign="top" class="jcprod_exprc"><span class="jcprod_sexprc">$24.95</span></td>				</tr>
						<tr>
					<td valign="top" style="height:160px;width:150px" class="jcprod_name">
					<img width="150px" height="124px" border="0" src="/images/stories/virtuemart/product/vtlogo_80x80299.png"><br>
					VTone DID (MRC)</td>
					<td width="60%" valign="top" class="jcprod_desc">VTone Additional Local or Toll Free DID - (Monthly Reoccurring Charges)</td>
					<td valign="top" class="jcprod_qty">
										1										</td>
					<td valign="top" class="jcprod_prc">$5.00</td>
					<td valign="top" class="jcprod_exprc"><span class="jcprod_sexprc">$5.00</span></td>				</tr>
		<tr class="trfoot"><td align="right" class="tfoot" colspan="3">Monthly Sub Total</td><td align="right" class="tfoot" colspan="2">$308.95</td></tr></tbody></table></td></tr><tr><td colspan="2"><table width="100%" cellspacing="2px" cellpadding="0" border="0" class="pcat">
			<tbody><tr><th align="left" style="color:#008EC4;background-color:#F1F1F1" class="jctblheading cname" colspan="5"><b>Setup</b></th></tr>
			<tr class="trtheading"><td width="60%" class="theading" colspan="2">Description</td><td class="theading">Qty</td><td class="theading">Price</td><td class="theading">Ext. Price</td></tr>
							<tr>
					<td valign="top" style="height:160px;width:150px" class="jcprod_name">
					<img width="150px" height="124px" border="0" src="/images/stories/virtuemart/product/vtlogo_80x80944.png"><br>
					VTone SB-BPlus Partner Setup</td>
					<td width="60%" valign="top" class="jcprod_desc">VirtualTone Hosted Phone System - Setup (One Time Charge)<br>-Install switch<br>-Configure switch per implementation sheet<br>-Testing with customer <br>-Setup Trunks</td>
					<td valign="top" class="jcprod_qty">
										1										</td>
					<td valign="top" class="jcprod_prc">$199.00</td>
					<td valign="top" class="jcprod_exprc"><span class="jcprod_sexprc">$199.00</span></td>				</tr>
						<tr>
					<td valign="top" style="height:160px;width:150px" class="jcprod_name">
					<img width="150px" height="124px" border="0" src="/images/stories/virtuemart/product/vtlogo_80x8089.png"><br>
					VTone DID Setup</td>
					<td width="60%" valign="top" class="jcprod_desc">VTone Additional Local or Toll Free DID - Setup</td>
					<td valign="top" class="jcprod_qty">
										2										</td>
					<td valign="top" class="jcprod_prc">$25.00</td>
					<td valign="top" class="jcprod_exprc"><span class="jcprod_sexprc">$50.00</span></td>				</tr>
						<tr>
					<td valign="top" style="height:160px;width:150px" class="jcprod_name">
					<img width="150px" height="124px" border="0" src="/images/stories/virtuemart/product/vtlogo_80x8087.png"><br>
					VTone Additional Trunk setup</td>
					<td width="60%" valign="top" class="jcprod_desc">VTone Additional Trunk setup (NRC)</td>
					<td valign="top" class="jcprod_qty">
										1										</td>
					<td valign="top" class="jcprod_prc">$0.00</td>
					<td valign="top" class="jcprod_exprc"><span class="jcprod_sexprc">$0.00</span></td>				</tr>
		<tr class="trfoot"><td align="right" class="tfoot" colspan="3">Setup Sub Total</td><td align="right" class="tfoot" colspan="2">$249.00</td></tr></tbody></table></td></tr><tr><td>&nbsp;</td><td align="right" class="jc_totalprice"><table width="100%" cellspacing="1px" cellpadding="1px" border="0" class="totaltaxnprice"><tbody><tr class="trtx"><td class="ttax">TAX: </td><td align="right" class="ttaxv">$0.00</td></tr><tr class="trtot"><td class="ttot">TOTAL: </td><td align="right" class="ttotv">$9,274.87</td></tr></tbody></table></td></tr><tr class="trpfoot"><td id="ATPF" colspan="2" class="pfoot"> <table width="100%" border="0"><tbody><tr><td><b><h2 style="color: rgb(0, 0, 0); visibility: visible;"><span>PAYMENT</span> OPTIONS</h2></b><span style="padding-left:8px">(By filling out this payment authorization form, you authorize Virtualtone, Inc. to charge the card below card or the card on file for the total charges of this customer order.)</span></td></tr><tr><td style="padding-left:8px"><input type="checkbox" disabled="disabled"><b>Pay By Credit Card</b><span style="padding-left:8px"><input type="checkbox" disabled="disabled"><b>Use payment information on file</b></span><span style="padding-left:8px"><input type="checkbox" disabled="disabled"><b>Request Financing</b></span></td></tr><tr><td><b>Credit Card Type</b><span style="padding-left:4px"><input type="checkbox" disabled="disabled">Mastercard</span><span style="padding-left:4px"><input type="checkbox" disabled="disabled">VISA</span><span style="padding-left:4px"><input type="checkbox" disabled="disabled">American Express</span></td></tr><tr><td style="padding-left:15px">Card Holder\'s Name:_______________________________________</td></tr><tr><td>Credit Card Number:_______________________________________</td></tr><tr><td>Credit Card Expires:_______/_______/_______<span style="padding-left:8px">Credit Card Verification #:___________</span></td></tr><tr><td>Card Holder\'s Address:_____________________________________________</td></tr><tr><td>City:_____________ State:_________ ZIP:_________</td></tr><tr><td>
<hr>Managing a smooth VirtualTone installation experience is our number one priority. Please take a few moments to read the following instructions.VirtualTone will be delivering your services over your current Internet and network infrastructure. This requires a VirtualTone Technician to work with the IT staff responsible for maintaining your router, switches, cabling, commonly known as your network infrastructure. In some cases adding cable drops, changing routers and switches may be necessary. If you do not have an IT staff that maintains your network a third party can be contacted to assist you in preparing your network, separate fees will apply. If you require assistant please contact your Sales Engineer to schedule an onsite evaluation before the testing phase of the install. Technical knowledge and troubleshooting of routers, switches and cabling is a must, choosing to do it yourself may cause delays if you do not have this knowledge. VirtualTone installations are scheduled Monday through Thursday 10am - 4pm CST, with the exception of holidays. Customers with multiple offices requesting the turn up (activate VirtualTone for inbound and outbound calling) of partial offices may be requested.</td></tr><tr><td>
<hr><span style="font-weight:bold;color:#000000">THIS CUSTOMER ORDER IS AN AGREEMENT BETWEEN THE ABOVE-SIGNED AND VIRTUALTONE, INC. TO PAY ANY CHARGES OR INVOICES RELATED TO THE GOODS AND SERVICES SET OUT HEREIN, SO PLEASE REVIEW AND NOTIFY THE CPM OF ANY ERRORS OR NECESSARY CHANGES BEFORE SIGNING. PLEASE ALLOW 12-15 BUSINESS DAYS FOR SETUP. ALL INVOICES SHALL BE PAID NET 14 DAYS FROM INVOICE DATE. A FINANCE CHARGE WILL BE ADDED AT THE RATE OF 1.5% PER MONTH (18% ANNUM) ON ANY UNPAID PAST DUE AMOUNT, OR IN THE MAXIMUM AMOUNT AUTHORIZED BY LAW. ALL COLLECTION COST, INCLUDING COLLECTION AGENCY FEES AND/OR REASONABLE ATTORNEYS\' FEES AND COSTS, INCURRES IN COLLECTION OF ANY UNPAID PAST DUE AMOUNT MAY BE RECOVERED BY VIRTUALTONE, INC., AND THE PARTIES AGREE TO VENUE IN WHARTON COUNTY, TEXAS. THIS CUSTOMER ORDER REPRESENTS ACCEPTANCE OF THE VIRTUALTONE "TERMS AND CONDITIONS" FOUND AT WWW.VIRTUALTONE.NET</span><br>To approve, please sign and email to sales@virtualtone.net or fax: 281-756-9802
</td></tr><tr><td><table width="100%" border="0"><tbody><tr><td align="right" style="background-color:#DCDCDC;color:#000000;font-weight:bold">CUSTOMER ORDER#:</td><td style="font-weight:bold" colspan="2"> VTP25063</td></tr><tr><td align="right" style="background-color:#DCDCDC;color:#000000;font-weight:bold">TOTAL:</td><td style="font-weight:bold">  $9,274.87</td><td>________________________ ________________</td></tr><tr><td align="right" style="background-color:#DCDCDC;color:#000000;font-weight:bold">CONTRACT TERM:</td><td style="font-weight:bold"> One Year</td><td>Approval Signature<span style="padding-left:67px">Date</span></td></tr><tr><td colspan="2">Created on: 03/01/2013</td><td align="right">Expiration: 03/31/2013</td></tr></tbody></table></td></tr></tbody></table>
</td></tr>	
	</tbody></table>
</div>
<input type="hidden" value=" &lt;table border=&quot;0&quot; width=&quot;100%&quot;&gt;&lt;tbody&gt;&lt;tr&gt;&lt;td&gt;&lt;b&gt;&lt;h2 style=&quot;color: rgb(0, 0, 0); visibility: visible;&quot;&gt;&lt;span&gt;PAYMENT&lt;/span&gt; OPTIONS&lt;/h2&gt;&lt;/b&gt;&lt;span style=&quot;padding-left:8px&quot;&gt;(By filling out this payment authorization form, you authorize Virtualtone, Inc. to charge the card below card or the card on file for the total charges of this customer order.)&lt;/span&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td style=&quot;padding-left:8px&quot;&gt;&lt;input disabled=&quot;disabled&quot; type=&quot;checkbox&quot;&gt;&lt;b&gt;Pay By Credit Card&lt;/b&gt;&lt;span style=&quot;padding-left:8px&quot;&gt;&lt;input disabled=&quot;disabled&quot; type=&quot;checkbox&quot;&gt;&lt;b&gt;Use payment information on file&lt;/b&gt;&lt;/span&gt;&lt;span style=&quot;padding-left:8px&quot;&gt;&lt;input disabled=&quot;disabled&quot; type=&quot;checkbox&quot;&gt;&lt;b&gt;Request Financing&lt;/b&gt;&lt;/span&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;&lt;b&gt;Credit Card Type&lt;/b&gt;&lt;span style=&quot;padding-left:4px&quot;&gt;&lt;input disabled=&quot;disabled&quot; type=&quot;checkbox&quot;&gt;Mastercard&lt;/span&gt;&lt;span style=&quot;padding-left:4px&quot;&gt;&lt;input disabled=&quot;disabled&quot; type=&quot;checkbox&quot;&gt;VISA&lt;/span&gt;&lt;span style=&quot;padding-left:4px&quot;&gt;&lt;input disabled=&quot;disabled&quot; type=&quot;checkbox&quot;&gt;American Express&lt;/span&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td style=&quot;padding-left:15px&quot;&gt;Card Holder\'s Name:_______________________________________&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Credit Card Number:_______________________________________&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Credit Card Expires:_______/_______/_______&lt;span style=&quot;padding-left:8px&quot;&gt;Credit Card Verification #:___________&lt;/span&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Card Holder\'s Address:_____________________________________________&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;City:_____________ State:_________ ZIP:_________&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;
&lt;hr&gt;Managing a smooth VirtualTone installation experience is our number one priority. Please take a few moments to read the following instructions.VirtualTone will be delivering your services over your current Internet and network infrastructure. This requires a VirtualTone Technician to work with the IT staff responsible for maintaining your router, switches, cabling, commonly known as your network infrastructure. In some cases adding cable drops, changing routers and switches may be necessary. If you do not have an IT staff that maintains your network a third party can be contacted to assist you in preparing your network, separate fees will apply. If you require assistant please contact your Sales Engineer to schedule an onsite evaluation before the testing phase of the install. Technical knowledge and troubleshooting of routers, switches and cabling is a must, choosing to do it yourself may cause delays if you do not have this knowledge. VirtualTone installations are scheduled Monday through Thursday 10am - 4pm CST, with the exception of holidays. Customers with multiple offices requesting the turn up (activate VirtualTone for inbound and outbound calling) of partial offices may be requested.&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;
&lt;hr&gt;&lt;span style=&quot;font-weight:bold;color:#000000&quot;&gt;THIS CUSTOMER ORDER IS AN AGREEMENT BETWEEN THE ABOVE-SIGNED AND VIRTUALTONE, INC. TO PAY ANY CHARGES OR INVOICES RELATED TO THE GOODS AND SERVICES SET OUT HEREIN, SO PLEASE REVIEW AND NOTIFY THE CPM OF ANY ERRORS OR NECESSARY CHANGES BEFORE SIGNING. PLEASE ALLOW 12-15 BUSINESS DAYS FOR SETUP. ALL INVOICES SHALL BE PAID NET 14 DAYS FROM INVOICE DATE. A FINANCE CHARGE WILL BE ADDED AT THE RATE OF 1.5% PER MONTH (18% ANNUM) ON ANY UNPAID PAST DUE AMOUNT, OR IN THE MAXIMUM AMOUNT AUTHORIZED BY LAW. ALL COLLECTION COST, INCLUDING COLLECTION AGENCY FEES AND/OR REASONABLE ATTORNEYS\' FEES AND COSTS, INCURRES IN COLLECTION OF ANY UNPAID PAST DUE AMOUNT MAY BE RECOVERED BY VIRTUALTONE, INC., AND THE PARTIES AGREE TO VENUE IN WHARTON COUNTY, TEXAS. THIS CUSTOMER ORDER REPRESENTS ACCEPTANCE OF THE VIRTUALTONE &quot;TERMS AND CONDITIONS&quot; FOUND AT WWW.VIRTUALTONE.NET&lt;/span&gt;&lt;br&gt;To approve, please sign and email to sales@virtualtone.net or fax: 281-756-9802
&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;&lt;table border=&quot;0&quot; width=&quot;100%&quot;&gt;&lt;tbody&gt;&lt;tr&gt;&lt;td style=&quot;background-color:#DCDCDC;color:#000000;font-weight:bold&quot; align=&quot;right&quot;&gt;CUSTOMER ORDER#:&lt;/td&gt;&lt;td colspan=&quot;2&quot; style=&quot;font-weight:bold&quot;&gt; VTP25063&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td style=&quot;background-color:#DCDCDC;color:#000000;font-weight:bold&quot; align=&quot;right&quot;&gt;TOTAL:&lt;/td&gt;&lt;td style=&quot;font-weight:bold&quot;&gt;  $9,274.87&lt;/td&gt;&lt;td&gt;________________________ ________________&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td style=&quot;background-color:#DCDCDC;color:#000000;font-weight:bold&quot; align=&quot;right&quot;&gt;CONTRACT TERM:&lt;/td&gt;&lt;td style=&quot;font-weight:bold&quot;&gt; One Year&lt;/td&gt;&lt;td&gt;Approval Signature&lt;span style=&quot;padding-left:67px&quot;&gt;Date&lt;/span&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td colspan=&quot;2&quot;&gt;Created on: 03/01/2013&lt;/td&gt;&lt;td align=&quot;right&quot;&gt;Expiration: 03/31/2013&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;
" id="pfootv" name="pfootv">';

$dompdf = new DOMPDF();

if ( isset($dompdf) ) {
	//echo "<pre>";print_r($dompdf); die();
}
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream("sample.pdf",array("Attachment" => 0));
unset($dompdf);
?>