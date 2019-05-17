$( document ).ready(function() {
    var base_url = window.location.origin;

    $('input[name=search]').bind('keyup', function(e) {
      var query = $(this).val();
      searchTasks(query);
    });

    function searchTasks(query) {
      if (query.length > 2) {
        $.ajax({
            url: base_url + '/tasks/search',
            cache: false,
            type: 'GET',
            data: {query:query},
            success: function (data) {
              $('.task-table-container').html(data);
            }
        });
      }
    }
});
