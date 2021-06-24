@section('footer')

    <script>

        function toogleOptions(){

            if($('#is_free').val()=='0'){
                $('.amount').show();
                console.log('not free');
            }
            else{
                $('.amount').hide();
                console.log('is free');
            }
        }

        $(function(){
            toogleOptions();
            $('#is_free').change(function(){
                toogleOptions();
            })
        })
    </script>
@endsection