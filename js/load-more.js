jQuery(function ($) { // use jQuery code inside this to avoid "$ is not defined" error
	$('.load-more').click(function () {
		var ajaxurl = loadmore_params.ajaxurl;
		var button = $(this),
			data = {
				'action': 'load_posts_by_ajax',
				'query': loadmore_params.posts, // that's how we get params from wp_localize_script() function
				'page': loadmore_params.current_page

			};



			$.post(ajaxurl, data, function(response) {
				button.before(response);

				//$('.row').append(response);
				loadmore_params.current_page++;

				if (loadmore_params.current_page == loadmore_params.max_page)
						button.remove(); // if last page, remove the button

				//page++;
			});

/* 
		$.ajax({ // you can also use $.post here
			url: loadmore_params.ajaxurl, // AJAX handler
			data: data,
			type: 'POST',

			
			success: function (data) {
				if (data) {
					//button.text('More posts').prev().before(data); // insert new posts
					button.text('More posts').before(data);

					loadmore_params.current_page++;

					if (loadmore_params.current_page == loadmore_params.max_page)
						button.remove(); // if last page, remove the button

					// you can also fire the "post-load" event here if you use a plugin that requires it
					// $( document.body ).trigger( 'post-load' );
				} else {
					button.remove(); // if no data, remove the button as well
				}
			},
			beforeSend: function (xhr) {
				button.text('Loading...'); // change the button text, you can also add a preloader image
				//console.log(data);
			},


		}); */
	});
}); 



