$( document ).ready(function() {
    var base_url = window.location.origin;

    $('input[name=search]').bind('keyup', function(e) {
      var keyword = $(this).val();

      if (keyword.length > 2) {
        searchTasks(keyword);
      } else if (keyword.length > 0) {
        hideResults();
      } else {
        hideResults();
      }
    });

    function searchTasks(keyword) {
      $.ajax({
        url: base_url + '/tasks/search',
        cache: false,
        type: 'GET',
        data: {keyword:keyword},
        success: function (data) {
          $('.search-results-table-container').html(data);
          showResults();
        }
      });
    }

    $('#btnTaskStatus :button').bind('click', function(e) {
      var status = $(this).val();
      searchTasksByStatus(status);
    });

    function searchTasksByStatus(status) {
      $.ajax({
        url: base_url + '/tasks/searchByStatus',
        cache: false,
        type: 'GET',
        data: {status:status},
        success: function (data) {
          $('.search-results-table-container').html(data);
          showResults();
        }
      });
    }

    function showResults() {
      $('.task-table-container').css('display', 'none');
      $('.search-results-table-container').css('display', 'block');
    }

    function hideResults() {
      $('.task-table-container').css('display', 'block');
      $('.search-results-table-container').css('display', 'none');
    }

});
