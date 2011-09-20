<?= $header ?>
<section id="WikiaPage" class="WikiaPage">
	<article id="WikiaMainContent" class="WikiaMainContent" style="float:none">
		<header id="EditPageHeader">
			<span class="wordmark <?= $wordmark['wordmarkSize'] ?> <?= $wordmark['wordmarkType'] ?> font-<?= $wordmark['wordmarkFont'] ?>" <?= $wordmark['wordmarkStyle'] ?>>
				<a accesskey="z" href="<?= htmlspecialchars($wordmark['mainPageURL']) ?>" title="<?= htmlspecialchars($wordmark['wordmarkText']) ?>">
				<? if (!empty($wordmark['wordmarkUrl'])) { ?>
					<img src="<?= $wordmark['wordmarkUrl'] ?>" alt="<?= htmlspecialchars($wordmark['wordmarkText']) ?>">
				<? } else { ?>
					<?php if (mb_substr($wordmark['wordmarkText'], 0, 10) == $wordmark['wordmarkText']) {
						$wordmarkShortText = htmlspecialchars($wordmark['wordmarkText']);
					} else {
						$wordmarkShortText = htmlspecialchars(mb_substr($wordmark['wordmarkText'], 0, 10)).'&hellip;';
					} ?>
					<?= $wordmarkShortText ?>

				<? } ?>
				</a>
			</span>
			<!-- "Editing" -->
			<h2>
				<?= $editing ?>
			</h2>
			<!-- edited page title -->
			<h1>
				<a href="<?= htmlspecialchars($title->getLocalUrl()) ?>" class="<?= $hideTitle ? 'hiddenTitle' : '' ?>" title="<?= htmlspecialchars($titleText) ?>"><?= $titleShortText ?></a>
			</h1>
			<!-- pencil icon -->
			<a id="EditPageTitle" title="<?= wfMsg('editpagelayout-edit-title') ?>">
				<img class="sprite edit-pencil-small" src="<?= $wgBlankImgUrl ?>">
			</a>
			<!-- mode switching tabs -->
			<nav id="EditPageTabs" class="editpage-tabs" data-space-type="tabs" data-space-autoshow="true" style="display:none"></nav>

			<!-- help link -->
			<aside id="HelpLink"><?= $helpLink ?></aside>

			<!-- notifications link -->
			<aside id="NotificationsLink"><a href="#"><?= $notificationsLink ?></a></aside>
		</header>

		<form id="editform" name="editform" method="post" action="<?= htmlspecialchars($editFormAction) ?>" enctype="multipart/form-data">
			<section id="EditPage">
				<div id="EditPageMain">
					<div id="EditPageToolbar" class="editpage-toolbar" data-space-type="toolbar"></div>
					<div id="EditPageEditorWrapper" data-space-type="editor">
						<div id="EditPageEditor" class="editpage-content">
							<!-- basic support for users with JS disabled -->
							<noscript><style>
								.edit-page-notices {
									display: block;
								}

								#EditPageCallbackFields {
									display: block !important;
								}
							</style></noscript>

							<!-- notifications -->
							<div class="editpage-notices" data-space-type="notices-short">
								<span class="splotch"><?= count($notices) ?></span>
								<ul>
<?php
	foreach ($notices as $hash => $notice) {
?>
									<li data-hash="<?= $hash ?>"><?= $notice ?></li>
<?php
	}
?>
								</ul>
							</div>
							<div class="editpage-notices-html" data-space-type="notices-html" style="display:none"><?= $noticesHtml?></div>

							<!-- preloads -->
							<?php
								if (!empty($editPagePreloads)) {

									foreach($editPagePreloads as $preloadId => $preload) {
							?>
							<div id="<?= $preloadId ?>" class="editpage-intro">
								<div class="editpage-intro-wrapper">
									<div class="<?= $preload['class'] ?>">
										<?= $preload['content'] ?>
									</div>
								</div>
								<a class="expand">
									<label><?= wfMsg('editpagelayout-more') ?></label>
									<span>+</span>
								</a>
							</div>
							<?php
									}
								}
							?>

							<!-- edit form content -->
							<?= $bodytext ?>

							<!-- loading indicator overlay (will be moved inside .editpage-editarea by JS)-->
							<div class="editpage-loading-indicator" data-space-type="loading-status" style="display:none">
								<div class="loading-background"></div>
								<div class="loading-message">
									<span class="loading-throbber">&nbsp;</span>
									<span class="loading-text">&nbsp;</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Collapse bar for widescreen source mode -->
				<div class="editpage-widemode-trigger" style="display: none">
					<span class="arrow"></span>
				</div>
				<div id="EditPageRail" class="editpage-rail" data-space-type="rail">
					<!-- Page Controls module -->
					<noscript><style>
						.module_page_controls .wikia-menu-button {
							display: none;
						}
					</style></noscript>
					<div class="module module_page_controls">
						<div class="module_content">
							<div class="checkboxes">
								<?php
									foreach($customCheckboxes as $checkbox) {
								?>
								<label class="<?= $checkbox['name'] ?>">
									<input type="checkbox" name="<?= $checkbox['name'] ?>" id="<?= $checkbox['name'] ?>" <?= $checkbox['checked'] ? ' checked="checked"' : '' ?> />
									<?= $checkbox['label'] ?>
								</label>
								<?php
									}
								?>
								<?php if($isLoggedIn){ ?>
								<label class="wpMinoredit">
									<input type="checkbox" name="wpMinoredit" id="wpMinoredit" accesskey="<?=wfMsg('accesskey-minoredit');?>"<?= $minorEditCheckbox ? ' checked="checked"' : '' ?> />
									<?= wfMsg('editpagelayout-pageControls-minorEdit') ?>
								</label>
								<?php } ?>
							</div>
							<label <?php if($isLoggedIn){ ?>class="wpSummary_loggedIn"<?php } ?> for="wpSummary">Edit Summary</label>
							<div id="wpSummaryLabel">
								<?= $summaryBox ?>
							</div>
							<nav class="buttons">
<?php
	foreach ($buttons as $button) {
	 	$buttonType = !empty($button['type']) ? $button['type'] : 'button';
		$buttonClasses = 'control-button'
			. ($button['seqNo'] % 2 == 1 ? ' even' : '')
			. (!empty($button['className']) ? ' ' . $button['className'] : '');
	 	switch ($buttonType) {
	 		case 'save':
?>
								<input class="<?=$buttonClasses?>" id="wpSave" name="wpSave" type="submit" value="<?= wfMsg('savearticle') ?>" accesskey="<?=wfMsg('accesskey-save');?>" />
<?php
	 			break;
	 		case 'preview':
?>
								<?php
									$dropdown = array(array(
										"id" => "wpDiff",
										"accesskey" => wfMsg('accesskey-diff'),
										"text" => wfMsg('showdiff')
									));
								?>
								<?= wfRenderModule('MenuButton',
										'Index',
										array(
											'action' => array("href" => "#", "text" => wfMsg('preview'), "id" => "wpPreview"),
											'class' => 'secondary '.$buttonClasses,
											'dropdown' => $dropdown
										)
									) ?>

<?php
	 			break;
	 		default:
?>
								<input class="<?=$buttonClasses?>"<?= !empty($button['disabled']) ? ' disabled="disabled"' : '' ?> id="<?=$button['name']?>" name="<?=$button['name']?>" type="<?=$buttonType?>" value="<?=$button['caption']?>" />
<?php
	 	}
	}
?>
							</nav>
						</div>
					</div>
				</div>
			</section>
		</form>
	</article>
	
	<? if ($wgUser->isLoggedIn()) { ?>
	<footer id="WikiaFooter" class="WikiaFooter">
		<div class="toolbar">
			<ul class="tools">
				<?= wfRenderModule('Footer','Toolbar') ?>
			</ul>
			<img src="<?= $wgBlankImgUrl; ?>" class="banner-corner-left" height="0" width="0">
			<img src="<?= $wgBlankImgUrl; ?>" class="banner-corner-right" height="0" width="0">
		</div>
	</footer>
	<? } ?>
	
</section>
