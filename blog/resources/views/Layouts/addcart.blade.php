<script type="text/javascript" src="{{asset('layer/layer.js')}}"></script>
<script type="text/javascript">
 function addcart (id) {
   if (id != '') {
     $.ajax({
       type: 'get',
       url: '{{url("cart/add")}}',
       data: 'id='+id+'&num=1',
       success: function (msg) {
         layer.msg('加入成功');
       }
     })
   }
 }
 function addCollection(id) {
   if (id != '') {
     $.ajax({
       type: 'get',
       url: '{{url("collection/add")}}',
       data: 'id='+id,
       success: function (msg) {
         if (msg == 0) {
            layer.confirm('请登录?', {icon: 3, title:'提示'}, function(index){
            window.location.replace("{{url('/login')}}");
            layer.close(index);
            });
         } else {
           layer.msg('收藏成功');
         }
       }
     })
   }
 }
</script>
<script type="text/javascript">
 $('.fancybox').attr('title', '商品大图')
 $('.ajax_add_to_cart').attr('title', '加入购物车')
 $('.add_to_wishlist').attr('title', '收藏此商品')
 $('.compare').attr('title', '分享此商品')
</script>
