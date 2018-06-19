<!-- help-page -->
	<div class="faq-w3agile" style="padding:2em 0;">
		<div class="container"> 
			<h2 class="w3_agile_header">Frequently asked questions(FAQ)</h2> 
			<ul class="faq">
				<li class="item1" style="font-size:20px;"><a href="#" title="click here">What is 'My Account'? How do I update my information ?</a>
					<ul>
						<li class="subitem1"><p> It is easy to update your account and view your orders any time through 'My Account'.
							'My Account' allows you complete control over your transactions
							<li style="line-height:0px;list-style:square">Manage/edit your personal data like address, phone numbers, email ids</li>
							<li style="line-height:0px;list-style:square">Change your password</li>
							<li style="line-height:0px;list-style:square">Track the status of your orders</li></p></li>										
					</ul>
				</li>
				<li class="item1" style="font-size:20px;"><a href="#" title="click here">Why do I see different prices for the same product?</a>
					<ul>
						<li class="subitem1"><p>A product could be listed under different prices. 
						There could be sellers offering you the same product but at a different price. 
						That is the nature of the marketplace, where different sellers compete for your order.</p></li>										
					</ul>
				</li>
				<li class="item1" style="font-size:20px;"><a href="#" title="click here">How do I sell on Electronics Shop?</a>
					<ul>
						<li class="subitem1"><p> It is easy to sell your product on electronics shop by creating account on shop
						and goto the my account page and select add product then fill the details and add product.</p></li>										
					</ul>
				</li>
				<li class="item1" style="font-size:20px;"><a href="#" title="click here">What is Cash on Delivery?</a>
					<ul>
						<li class="subitem1"><p>If you are not comfortable making an online payment,
						you can opt for the Cash on Delivery (C-o-D) payment method instead. With C-o-D you can pay in cash at the time of actual
						delivery of the product at your doorstep, without requiring you to make any advance payment online.</p></li>										
					</ul>
				</li>
				<li class="item1" style="font-size:20px;"><a href="#" title="click here">How do I check the current status of my orders?</a>
					<ul>
						<li class="subitem1"><p>You can review the status of your orders and other related information in the 'My Account' section
						In the My Account page, click on the 'My Orders' link to view the status of all your orders. To view the status of a specific order, 
						click on the 'Track Order' link.</p></li>										
					</ul>
				</li>
				<li class="item1" style="font-size:20px;"><a href="#" title="click here">How do I cancel an order?</a>
					<ul>
						<li class="subitem1"><p>You can cancel your order online before the product has been shipped. Your entire order amount will be refunded.
						In case the item you have ordered has been shipped but has not yet been delivered to you, you may still cancel the order online. Your refund will be processed once 
						we receive the originally ordered item back from the courier.</p></li>
						<li class="subitem1"><p>Login to your account and click on my account tab then select my order and click on cancel order you want to cancel.</p></li>						
					</ul>
				</li>
			</ul> 
			<!-- script for tabs -->
			<script type="text/javascript">
				$(function() {
				
					var menu_ul = $('.faq > li > ul'),
						   menu_a  = $('.faq > li > a');
					
					menu_ul.hide();
				
					menu_a.click(function(e) {
						e.preventDefault();
						if(!$(this).hasClass('active')) {
							menu_a.removeClass('active');
							menu_ul.filter(':visible').slideUp('normal');
							$(this).addClass('active').next().stop(true,true).slideDown('normal');
						} else {
							$(this).removeClass('active');
							$(this).next().stop(true,true).slideUp('normal');
						}
					});
				
				});
			</script>
			<!-- script for tabs -->   
		</div>
	</div>