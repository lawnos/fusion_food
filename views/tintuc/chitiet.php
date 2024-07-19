<div class="page-content bg-white">
	<!-- Banner  -->
	<div class="dz-bnr-inr style-1 text-center bg-parallax" style="background-image:url('views/assets/images/banner/bnr2.jpg'); background-size:cover; background-position:center;">
		<div class="container">
			<div class="dz-bnr-inr-entry">
				<h1>Chi tiết tin tức</h1>
				<!-- Breadcrumb Row -->
				<nav aria-label="breadcrumb" class="breadcrumb-row">
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
						<li class="breadcrumb-item active" aria-current="page">Tin tức</li>
						<li class="breadcrumb-item active" aria-current="page">Chi tiết tin tức</li>
					</ul>
				</nav>
				<!-- Breadcrumb Row End -->
			</div>
		</div>
	</div>
	<!-- Banner End -->

	<!-- Blog Detail -->
	<section class="content-inner">
		<div class="min-container">
			<div class="row">
				<div class="col-xl-12 col-lg-12">
					<div class="blog-single dz-card sidebar">
						<div class="dz-media rounded-md">
							<img src="./uploads/monan/<?php echo $tintucchitiet['anh_tintuc'] ?>" alt="">
						</div>
						<div class="dz-info">
							<h1 class="title"><?php echo $tintucchitiet['ten_tintuc']  ?></h1>

							<div class="dz-post-text">
								<p><?php echo $tintucchitiet['motangan']  ?></p>
								<p><?php echo $tintucchitiet['mota_tintuc']  ?></p>

							</div>
						</div>

						<div class="dz-share-post">

							<div class="dz-social-icon">
								<ul>
									<li><a target="_blank" class="btn-social btn-sm text-primary" href="https://www.facebook.com/">
											<i class="fab fa-facebook-f"></i>
										</a></li>
									<li><a target="_blank" class="btn-social btn-sm text-primary" href="https://twitter.com/">
											<i class="fab fa-twitter"></i>
										</a></li>
									<li><a target="_blank" class="btn-social btn-sm text-primary" href="https://www.instagram.com/">
											<i class="fab fa-instagram"></i>
										</a></li>
									<li><a target="_blank" class="btn-social btn-sm text-primary" href="https://www.linkedin.com/">
											<i class="fa-brands fa-linkedin-in"></i>
										</a></li>
								</ul>
							</div>
						</div>
					</div>

					<!-- <div class="clear" id="comment-list">
                            <div class="comments-area" id="comments">
								<h4 class="comments-title">Comments (03)</h4>
                                <div class="clearfix">
                                     
                                    <ul class="comment-list">
                                        <li class="comment">
                                            <div class="comment-body">
                                                <div class="comment-author vcard"> 
													<img  class="avatar photo" src="assets/images/testimonial/mini/pic1.jpg" alt="/"> 
													<cite class="fn">Monsur Rahman Lito</cite>
												</div>
                                                <p class="font-14 mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                                <div class="reply"> 
													<a href="javascript:void(0);" class="comment-reply-link">
													Reply</a> 
												</div>
                                            </div>
                                            <ol class="children">
                                                <li class="comment odd parent">
                                                    <div class="comment-body">
                                                        <div class="comment-author vcard"> 
															<img  class="avatar photo" src="assets/images/testimonial/mini/pic2.jpg" alt="/"> 
															<cite class="fn">Jake Johnson</cite>
														</div>
                                                       <p class="font-14 mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
														<div class="reply"> 
															<a href="javascript:void(0);" class="comment-reply-link">
														     Reply</a> 
														</div>
                                                    </div>
                                                    
                                                </li>
                                            </ol>
                                            
                                        </li>
                                        <li class="comment">
                                            <div class="comment-body">
                                                <div class="comment-author vcard"> 
													<img  class="avatar photo" src="assets/images/testimonial/mini/pic3.jpg" alt="/"> 
													<cite class="fn">John Doe</cite> 
												</div>
                                                <p class="font-14 mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
												<div class="reply"> 
													<a href="javascript:void(0);" class="comment-reply-link">
													Reply</a> 
												</div>
                                            </div>
                                        </li>
                                    </ul>
                                   >
                                    
                                    <div class="comment-respond style-1" id="respond">
                                        <h4 class="comment-reply-title" id="reply-title">Good Comments 
											<small><a style="display:none;" href="javascript:void(0);" id="cancel-comment-reply-link" rel="nofollow">Cancel reply</a></small>
										</h4>
                                        <form class="comment-form" id="commentform" method="post">
                                            <p class="comment-form-author">
                                                <label for="author">Name <span class="required">*</span></label>
                                                <input type="text" name="dzName"  placeholder="Author" id="author">
                                            </p>
                                            <p class="comment-form-email">
                                                <label for="email">Email <span class="required">*</span></label>
                                                <input type="text" placeholder="Email" name="dzEmail" id="email">
                                            </p>
                                            <p class="comment-form-comment">
                                                <label for="comment">Comment</label>
                                                <textarea rows="8" name="comment" placeholder="Type Comment Here" id="comment"></textarea>
                                            </p>
                                            <p class="form-submit">
												<button type="submit" class="btn btn-primary btn-hover-1" id="submit"><span>Submit Now</span></button>
                                            </p>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div> -->
				</div>
			</div>
		</div>
	</section>
	<!-- Blog Detail End -->
</div>