<!DOCTYPE html>
<html lang="ko">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1" />
	<link href="https://design01.codeidea.io/link_shortcut.svg" rel="shortcut icon">
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

	<link rel="stylesheet" href="./dist/css/app.css" />
	<link rel="stylesheet" href="./pub/css/reset.css" />
	<link rel="stylesheet" href="./dist/css/custom.css" />
	<link href="https://design01.codeidea.io/link_style.css" rel="stylesheet">
	<script type="text/javascript" src="./pub/js/jquery.min.js"></script>
	<title>temp</title>
</head>

<body>

	<div class="publishing-help">
		<span class="title">temp</span>
		<span class="label not">작업중</span>
		<span class="label popup">팝업</span>
		<span class="label change">수정</span>
		<span class="label add">최근 추가</span>
		<span class="tag-repeat">중복</span>
		<label class="toggle-light ml100"><input type="checkbox" name="" value="1" class="modal-list-toggle" checked /><span></span><span class="labelOn">팝업 열림</span><span class="labelOff">팝업 가림</span></label>
	</div>

	<?php
	function txtRecord($dir)
	{
		if (is_dir($dir)) {
			$handle  = opendir($dir);
			$files = array();
			while (false !== ($filename = readdir($handle))) {
				if ($filename == "." || $filename == "..") continue;
				if (is_file($dir . "/" . $filename)) {
					$files[] = $filename;
				}
			}
			closedir($handle);
			rsort($files);
			if (count($files) > 0) {
				echo '<div class="_record rsort">';
				echo '<ul>';
				foreach ($files as $f) {
					$name = '수정 ' . preg_replace("/[^0-9]*/s", "", $f);
					echo '<li><a href="' . $dir . $f . '" target="_black">' . $name . '</a></li>';
				}
				echo '</ul>';
				echo '</div>';
			}
		}
	}
	echo txtRecord('./@record/');
	?>
	<div id="publishingContainer">
		<ul class="page-link">
			<li class="" data-label="메인"><a href="index.html" target="_blank">메인</a></li>
		</ul>
	</div>




	<?php
	//modal 팝업
	include_once('_modal_pop.php');
	?>

	<script type="text/javascript" src="./dist/js/app.js"></script>
	<script src="./dist/js/ckeditor-classic.js"></script>

	<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<script src='https://design01.codeidea.io/link_script.js'></script>
	<script>
		$('.modal-list-toggle').change(function() {
			var checked = $(this).is(":checked");
			if (checked) {
				$('.ul-pop').slideDown(400);
			} else {
				$('.ul-pop').slideUp(400);
			}
		});

	</script>
	<script type="text/javascript" src="pub/js/bootstrap-datepicker/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="pub/js/bootstrap-datepicker/bootstrap-datepicker.ko.min.js"></script>

</body>

</html>