<script type="text/javascript">
 function addcart (id) {
   if (id != '') {
     $.ajax({
       type: 'get',
       url: '{{url("cart/add")}}',
       data: 'id='+id+'&num=1',
       success: function (msg) {
         alert('加入成功');
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
           alert('请登录')
         } else {
           alert('收藏成功')
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
