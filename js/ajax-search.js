jQuery(document).ready(function($) {
    var searchRequest;
    var searchInput = $('.woocommerce-product-search input[name="s"]');
    var form = $('.woocommerce-product-search');
    
    // Create dropdown container
    var resultsDropdown = $('<div class="search-results-dropdown"></div>');
    form.append(resultsDropdown);

    searchInput.on('input', function() {
        var term = $(this).val();

        if (term.length < 3) {
            resultsDropdown.hide().html('');
            return;
        }

        if (searchRequest) {
            searchRequest.abort();
        }

        searchRequest = $.ajax({
            url: amalabs_ajax.ajax_url,
            type: 'post',
            data: {
                action: 'amalabs_ajax_search',
                term: term
            },
            beforeSend: function() {
                resultsDropdown.show().html('<div class="search-loading">Buscando...</div>');
            },
            success: function(response) {
                if (response.success && response.data.length > 0) {
                    var html = '<ul>';
                    $.each(response.data, function(index, product) {
                        html += '<li>';
                        html += '<a href="' + product.url + '">';
                        if (product.image) {
                            html += '<span class="search-thumb"><img src="' + product.image + '" alt="' + product.title + '"></span>';
                        }
                        html += '<span class="search-title">' + product.title + '</span>';
                        if (product.price) {
                            // html += '<span class="search-price">' + product.price + '</span>';
                        }
                        html += '</a>';
                        html += '</li>';
                    });
                    html += '</ul>';
                    resultsDropdown.html(html);
                } else {
                    resultsDropdown.html('<div class="search-no-results">Nenhum produto encontrado.</div>');
                }
            }
        });
    });

    // Close on click outside
    $(document).on('click', function(e) {
        if (!$(e.target).closest('.woocommerce-product-search').length) {
            resultsDropdown.hide();
        }
    });
});
