<!DOCTYPE html>
<html>
<head>
    <title>AJAX Pagination Example</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            // show first page by default
            fetch_data(1);

            function fetch_data(page){
                $.ajax({
                    url: "fetch_data.php",
                    method: "POST",
                    data: {page:page},
                    dataType: "json",
                    success: function(data){
                        $('#pagination_data').html(data.pagination_data);
                        $('#table_data').html(data.table_data);
                    }
                });
            }

            $(document).on('click', '.pagination_link', function(){
                var page = $(this).attr("id");
                fetch_data(page);
            });
        });
    </script>
</head>
<body>
    <div id="table_data"></div>
    <div id="pagination_data"></div>
</body>
</html>
