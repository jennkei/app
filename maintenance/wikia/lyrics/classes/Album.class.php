<?php
/**
 * Created by PhpStorm.
 * User: aquilax
 * Date: 2/26/14
 * Time: 2:00 PM
 */

class Album extends BaseLyricsEntity {

	const TABLE_NAME = 'lyrics_api.album';

	var $dataMap = [
		'article_id' => 'article_id',
		'artist_id' => 'artist_id',
		'Album' => 'name',
		'Cover' => 'pic',
		'year' => 'year',
		'Length' => 'length',
		'Genre' => 'genres',
		'Wikipedia' => 'wikipedia',
		'romanizedAlbum' => 'romanized_name',
		'asin' => 'asin',
		'iTunes' => 'itunes',
		'allmusic' => 'allmusic',
		'discogs' => 'discogs',
		'musicbrainz' => 'musicbrainz',
		'download' => 'download',
	];

	function save( $albumData ) {
		$albumData = $this->sanitiseData( $albumData, $this->dataMap );
		$this->db->replace(
			self::TABLE_NAME,
			null,
			$albumData,
			__METHOD__
		);
	}

}