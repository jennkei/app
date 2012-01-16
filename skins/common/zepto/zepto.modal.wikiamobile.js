(function( $ ){

	$._modalCreated = false;
	$._position = 1;
	$._timer =  null;
	$._caption = false;
	$._hideBarsAfter = 2500;

	$._createModal =  function() {
		var resolution = WikiaMobile.getDeviceResolution(),
		modal = '<div id=modalWrapper>\
			<div id=modalTopBar></div>\
			<div id=modalClose>&times;</div>\
			<div id=modalContent></div>\
			<div id=modalFooter></div>\
			</div><style>#modalWrapper{min-height:' + resolution[1] + 'px;}@media only screen and (orientation:landscape) and (min-width: 321px){#modalWrapper{min-height:' + resolution[0] + 'px;}}</style>',
		that = this,
		body = $(document.body);

		body.append(modal);

		this._modal = $('#modalWrapper');
		this._modalClose = $('#modalClose');
		this._modalTopBar = $('#modalTopBar');
		this._modalContent = $('#modalContent');
		this._modalFooter = $('#modalFooter');
		this._modalClose = $('#modalClose');
		this._allToHide = this._modalTopBar.add(this._modalClose).add(this._modalFooter);
		this._thePage = $('#WikiaAdPlace, #wkTopNav, #WikiaPage, #wikiaFooter');

		//hide adress bar on orientation change
		window.onorientationchange = function() {
				if(window.pageYOffset == 0) setTimeout(function() {window.scrollTo( 0, 1 )},10);
		}

		//close modal on back button
		if ("onhashchange" in window) {
			window.addEventListener("hashchange", function() {
				if(window.location.hash == "") {
					that.closeModal();
				}
			}, false);
		}

		this._modalClose.bind(WikiaMobile.getClickEvent(), function(event) {
			that.closeModal();
		});

		this._modal.bind(WikiaMobile.getTouchEvent(), function() {
			if($(this).hasClass('imageModal')) {
				window.scrollTo( 0, 1 );
			}
			that._resetTimeout();
		});

		//handling next/previous image in lightbox
		body.delegate('#nextImage', WikiaMobile.getClickEvent(), function() {
			$._nextImage($(this).prev());
		})
		.delegate('#previousImage', WikiaMobile.getClickEvent(), function() {
			that._previousImage($(this).next());
		})
		.delegate('#nextImage', 'swipeLeft', function() {
			$._nextImage($(this).prev());
		})
		.delegate('#previousImage', 'swipeRight', function() {
			that._previousImage($(this).next());
		})
		.delegate('.fullScreenImage', 'swipeLeft', function() {
			$._nextImage($(this));
		})
		.delegate('.fullScreenImage', 'swipeRight', function() {
			that._previousImage($(this));
		});

		this._modalCreated = true;
	};

	$._nextImage = function(imagePlace) {
		var nextImageNumber = parseInt(imagePlace.data('number')) + 1;

		if(WikiaMobile.getImages().length <= nextImageNumber) {
			nextImageNumber = 0;
		}
		this._changeImage(nextImageNumber, imagePlace);
	};

	$._previousImage = function(imagePlace) {
		var previousImageNamber = parseInt(imagePlace.data('number')) - 1;

		if(previousImageNamber < 0) {
			previousImageNamber = WikiaMobile.getImages().length-1;
		}
		this._changeImage(previousImageNamber, imagePlace);
	};

	$._changeImage = function(imageNumber, fullScreen) {
		var image = WikiaMobile.getImages()[imageNumber],
		img = new Image();

		$.showLoader(fullScreen,{center: true});

		img.src = image[0];
		fullScreen.css('background-image','url()');
		img.onload =  function() {
			fullScreen.css('background-image','url("' + img.src + '")').data('number', imageNumber);
			img = null;
			$.hideLoader(fullScreen);
		};

		this._showCaption(image[1]);
	};

	$._showCaption = function(caption) {
		if(caption) {
			this._modalFooter.show();
			this._modalFooter.html(caption);
			this._caption = true;
		} else {
			this._caption = false;
			this._modalFooter.hide();
		}
	};

	$.openModal =  function(options) {
		options = options || {};

		var html = options.html,
			imageNumber = options.imageNumber,
			addClass = options.addClass,
			toHide = options.toHide,
			onOpen = options.onOpen,
			modal;

		//needed for closing modal on back button
		window.location.hash = "modalOpen";

		if(!(html || imageNumber)) throw "No content provided for modal";

		if(!this._modalCreated) this._createModal();

		modal = this._modal;

		if(addClass){
			modal.addClass(addClass);
		}else{
			modal.attr('class', '');
		}

		if(html){
			this._modalContent.html(html);
		}else if(imageNumber){
			this._modalContent.html('<div class=changeImageButton id=previousImage><div class=changeImageChevron></div></div><div class=fullScreenImage></div><div class=changeImageButton id=nextImage><div class=changeImageChevron></div></div>');
			$._changeImage(imageNumber, $('.fullScreenImage'));
		}

		this._showCaption(options.caption);

		if(toHide){
			if(typeof toHide == 'string'){
				this._toHide = $(toHide);
			}else if(toHide instanceof Array){
				for(var i = 0, l = toHide.length; i < l; i++) {
					this._toHide.add(toHide[i]);
				}
			}else{
				this._toHide = null;
			}
		}else{
			this._toHide = null;
		}

		if(typeof onOpen == 'function'){
			onOpen();
		}

		this._position = window.pageYOffset;
		this._thePage.hide();
		modal.addClass('modalShown');
		this._resetTimeout();
	};

	$._resetTimeout = function() {
		var allToHide = this._allToHide,
		toHide = this._toHide || false;

		allToHide.removeClass('hidden');
		if(toHide) toHide.removeClass('hidden');

		clearTimeout(this._timer);
		this._timer = setTimeout(function() {
			allToHide.addClass('hidden');
			if(toHide) toHide.addClass('hidden');
		}, this._hideBarsAfter);
	};

	$.closeModal =  function() {
		if(this._modalCreated) {
			this.hideModal();
			this._modalContent.html('');
			this._modalFooter.html('');
			this._modal.attr('class', '');
		}
	};

	$.hideModal = function() {
		if(this._modalCreated) {
			var modal = this._modal;

			modal.removeClass('modalShown');
			this._allToHide.removeClass('hidden');
			this._thePage.show();
			clearTimeout(this._timer);
			window.scrollTo(0, this._position);
			this._position = 1;
		}
	};

	$.isModalShown = function(){
		return this._modal.hasClass('modalShown');
	};
})(Zepto);