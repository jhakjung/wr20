<!-- SECTION: Jumbotron
	====================================================== -->
<section class="container mb-0 px-4">
	<div class="section-content">
    	<div class="container mt-3 p-2">
      		<h3 class="font-weight-bold pt-2">

				<?php
				// 현재 페이지가 index.php = 전체 게시글
				if(is_home()) { ?>
					<span class="light-dark fs-3">
						<!-- <i class="fas fa-home fa-sm"></i>&nbsp;&nbsp; -->
						전체 게시글
					</span>

				<?php
				// archive 페이지: archive.php
				} elseif(is_archive()) {
					echo get_the_archive_title();
					is_category('issue') ? issue_status_group() : '';

				// single 포스트: single.php
				} elseif(is_single()) { ?>
					<i class="fas fa-check-circle fa-sm"></i>&nbsp;&nbsp;
					<?php
					echo get_the_title(); ?>
					<?php $slug = get_post_field('post_name', get_the_ID()); ?>
					<span class="text-muted float-right" style="font-size:75%"><?php echo '#' .$slug; ?></span>
					<?php
					is_category('issue') ? issue_status_group() : '';

				// 현재 페이지가 이슈: 해결
				} elseif(is_page('issue-solved')) { ?>
					<i class="fas fa-folder-open fa-sm"></i>&nbsp;&nbsp;이슈
					<span class="badge bg-vivid-cyan2 mx-1">해결</a></span>
					<?php issue_status_group();

				// 현재 페이지가 이슈: 미해결
				} elseif(is_page('issue-unsolved')) { ?>
					<i class="fas fa-folder-open fa-sm"></i>&nbsp;&nbsp;이슈
					<span class="badge bg-vivid-red mx-1">미해결</a></span>
					<?php issue_status_group();

				// 현재 페이지가 이슈: 종결
				} elseif(is_page('issue-closed')) { ?>
					<i class="fas fa-folder-open fa-sm"></i>&nbsp;&nbsp;이슈
					<span class="badge badge-secondary mx-1">종결</a></span>
					<?php issue_status_group();

				// 첨부 파일: attachment.php
				} elseif(is_search()) { ?>
					<span class="fs-3 pr-3">
						<i class="fas fa-search fa-sm"></i>&nbsp;&nbsp;검색 결과 :
					</span>
					<?php echo get_search_query(); ?>

				<?php
				// 검색 결과: search.php
				} else { ?>
					<span class="fs-3">
						<i class="fas fa-search fa-sm"></i>&nbsp;&nbsp;???
					</span>
				<?php } ?>
      		</h3>
      		<hr>
    	</div>
  	</div>
</section>
<!-- SECTION: Jumbotron -->