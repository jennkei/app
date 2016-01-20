<?php
namespace Wikia\Search\Result;

use Wikia\Search\MediaWikiService, Wikia\Search\Utilities, CommunityDataService, ImagesService, WikiaSearchController;
class ResultHelper {

	public static function extendResult($result, $pos, $descWordLimit) {

		$thumbTracking = 'class="wiki-thumb-tracking" data-pos="' . $pos . '" data-event="search_click_wiki-thumb"';

		$commData = new CommunityDataService($result['id']);
		$imageURL = ImagesService::getImageSrc($result['id'], $commData->getCommunityImageId(),
			WikiaSearchController::CROSS_WIKI_PROMO_THUMBNAIL_WIDTH, WikiaSearchController::CROSS_WIKI_PROMO_THUMBNAIL_HEIGHT )['src'];

		if ( empty( $imageURL ) ) {
			// display placeholder image if no thumbnail
			$imageURL = \F::app()->wg->ExtensionsPath . '/wikia/Search/images/wiki_image_placeholder.png';
			$thumbTracking = 'class="wiki-thumb-tracking" data-pos="' . $pos . '" data-event="search_click_wiki-no-thumb"';
		}

		$description = $commData->getCommunityDescription();
		$description = !empty($description)
			? $description
			: $result->getText( Utilities::field( 'description' ), $descWordLimit );

		$service = new MediaWikiService();

		return [
			'isOnWikiMatch' => isset($result['onWikiMatch']) && $result['onWikiMatch'],
			'thumbTracking' => $thumbTracking,
			'imageURL' => $imageURL,
			'description' => $description,
			'pagesMsg' => $service->shortnumForMsg( $result['articles_i']?:0, 'wikiasearch2-pages' ),
			'imgMsg' => $service->shortnumForMsg( $result['images_i']?:0, 'wikiasearch2-images' ),
			'videoMsg' => $service->shortnumForMsg( $result['videos_i']?:0, 'wikiasearch2-videos' ),
			'title' => ( $sn = $result->getText( 'sitename_txt' ) ) ? $sn : $result->getText( 'headline_txt' ),
			'url' => $result->getText( 'url' ),
			'hub' => $result->getHub(),
			'pos' => $pos
		];
	}
}