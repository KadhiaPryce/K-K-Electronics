var $slider = $(".slideshow .slider"),
	maxItems = $(".item", $slider).length,
	dragging = false,
	tracking,
	rightTracking;

$sliderRight = $(".slideshow")
	.clone()
	.addClass("slideshow-right")
	.appendTo($(".split-slideshow"));

rightItems = $(".item", $sliderRight).toArray();
reverseItems = rightItems.reverse();
$(".slider", $sliderRight).html("");
for (i = 0; i < maxItems; i++) {
	$(reverseItems[i]).appendTo($(".slider", $sliderRight));
}

$slider.addClass("slideshow-left");
$(".slideshow-left")
	.slick({
		vertical: true,
		verticalSwiping: true,
		arrows: false,
		infinite: true,
		dots: false,
		speed: 1000,
		cssEase: "cubic-bezier(0.7, 0, 0.3, 1)"
	})
	.on("beforeChange", function (event, slick, currentSlide, nextSlide) {
		event.preventDefault();
		if (
			currentSlide > nextSlide &&
			nextSlide == 0 &&
			currentSlide == maxItems - 1
		) {
			$(".slideshow-right .slider").slick("slickGoTo", -1);
			$(".slideshow-text").slick("slickGoTo", maxItems);
		} else if (
			currentSlide < nextSlide &&
			currentSlide == 0 &&
			nextSlide == maxItems - 1
		) {
			$(".slideshow-right .slider").slick("slickGoTo", maxItems);
			$(".slideshow-text").slick("slickGoTo", -1);
		} else {
			$(".slideshow-right .slider").slick(
				"slickGoTo",
				maxItems - 1 - nextSlide
			);
			$(".slideshow-text").slick("slickGoTo", nextSlide);
		}
	})
	.on("mousewheel", function (event) {
		event.preventDefault();
		if (event.deltaX > 0 || event.deltaY < 0) {
			$(this).slick("slickNext");
		} else if (event.deltaX < 0 || event.deltaY > 0) {
			$(this).slick("slickPrev");
		}
	})
	.on("mousedown touchstart", function () {
		dragging = true;
		tracking = $(".slick-track", $slider).css("transform");
		tracking = parseInt(tracking.split(",")[5]);
		rightTracking = $(".slideshow-right .slick-track").css("transform");
		rightTracking = parseInt(rightTracking.split(",")[5]);
	})
	.on("mousemove touchmove", function () {
		if (dragging) {
			newTracking = $(".slideshow-left .slick-track").css("transform");
			newTracking = parseInt(newTracking.split(",")[5]);
			diffTracking = newTracking - tracking;
			$(".slideshow-right .slick-track").css({
				transform:
					"matrix(1, 0, 0, 1, 0, " + (rightTracking - diffTracking) + ")"
			});
		}
	})
	.on("mouseleave touchend mouseup", function () {
		dragging = false;
	});

$(".slideshow-right .slider").slick({
	swipe: false,
	vertical: true,
	arrows: false,
	infinite: true,
	speed: 950,
	cssEase: "cubic-bezier(0.7, 0, 0.3, 1)",
	initialSlide: maxItems - 1
});
$(".slideshow-text").slick({
	swipe: false,
	vertical: true,
	arrows: false,
	infinite: true,
	speed: 900,
	cssEase: "cubic-bezier(0.7, 0, 0.3, 1)"
});

class StickyNavigation {
	constructor() {
		this.currentId = null;
		this.currentTab = null;
		this.tabContainerHeight = 70;
		let self = this;
		$(".et-hero-tab").click(function () {
			self.onTabClick(event, $(this));
		});
		$(window).scroll(() => {
			this.onScroll();
		});
		$(window).resize(() => {
			this.onResize();
		});
	}

	onTabClick(event, element) {
		event.preventDefault();
		let scrollTop =
			$(element.attr("href")).offset().top - this.tabContainerHeight + 1;
		$("html, body").animate({ scrollTop: scrollTop }, 600);
	}

	onScroll() {
		this.checkTabContainerPosition();
		this.findCurrentTabSelector();
	}

	onResize() {
		if (this.currentId) {
			this.setSliderCss();
		}
	}

	checkTabContainerPosition() {
		let offset =
			$(".et-hero-tabs").offset().top +
			$(".et-hero-tabs").height() -
			this.tabContainerHeight;
		if ($(window).scrollTop() > offset) {
			$(".et-hero-tabs-container").addClass("et-hero-tabs-container--top");
		} else {
			$(".et-hero-tabs-container").removeClass("et-hero-tabs-container--top");
		}
	}

	findCurrentTabSelector(element) {
		let newCurrentId;
		let newCurrentTab;
		let self = this;
		$(".et-hero-tab").each(function () {
			let id = $(this).attr("href");
			let offsetTop = $(id).offset().top - self.tabContainerHeight;
			let offsetBottom =
				$(id).offset().top + $(id).height() - self.tabContainerHeight;
			if (
				$(window).scrollTop() > offsetTop &&
				$(window).scrollTop() < offsetBottom
			) {
				newCurrentId = id;
				newCurrentTab = $(this);
			}
		});
		if (this.currentId != newCurrentId || this.currentId === null) {
			this.currentId = newCurrentId;
			this.currentTab = newCurrentTab;
			this.setSliderCss();
		}
	}

	setSliderCss() {
		let width = 0;
		let left = 0;
		if (this.currentTab) {
			width = this.currentTab.css("width");
			left = this.currentTab.offset().left;
		}
		$(".et-hero-tab-slider").css("width", width);
		$(".et-hero-tab-slider").css("left", left);
	}
}

new StickyNavigation();

//Credits
//https://codepen.io/ettrics/pen/WRbGRN
//https://codepen.io/supah/pen/zZaPeE
