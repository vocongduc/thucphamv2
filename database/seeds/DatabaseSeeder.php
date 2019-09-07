<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        
        $location = "Cộng tác viên,Quản trị viên,Admin";
        $explode = explode(',',$location);
        foreach($explode as $ex)
        {
            DB::table('role')->insert([
                'name' => $ex
            ]);
        }
        DB::table('admins')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'status' => '1',
            'level' => '3',
            'created_at' => now(),
            'password' => bcrypt('12345678') // password :12345678
        ]);
        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'status' => '1',
            'email_verified_at' => now(),
            'created_at' => now(),
            'password' => bcrypt('12345678'), // password :12345678
        ]);
        // contact infor comny
        DB::table('change_contacts')->insert([
            'name' =>'CÔNG TY THỰC PHẨM SẠCH MYTAMMART VIỆT NAM',
            'phone' =>'0967.26.88.26',
            'address' =>'A11, Ngõ 100, Đường Trung Kính, Phường Yên Hòa, Quận Cầu Giấy ',
            'certificate' =>'0104567410 do sở kế hoạch và đầu tư Thành phố Hà Nội cấp ngày 14',
            'email' =>'cskh@mytammart.vn',
            'fblink' =>'http://www.facebook.com/mytammart.com.vn',
            'website' =>'http://www.mytammart.vn'
        ]);

//        Database News
        $cate_news =array('Ẩm thực','Kiến thức','Truyền thông báo trí');
        for ($i = 0; $i < 3; $i++)
        {
            DB::table('cate_news')->insert([

                'name' => $cate_news[$i],
                'slug'=>str_slug($cate_news[$i]),
                'created_at'=>now(),
            ]);
        }
        for ($i = 0; $i < 10; $i++)
        {
            DB::table('news')->insert([
                'name'=>'Tại sao chúng ta nên ăn thường xuyên quả mướp đắng?',
                'slug'=>'tai-sao-chung-ta-nen-an-thuong-xuyen-qua-muop-dang',
                'image'=>'AORj_image_muop-dang__2_84.jpg',
                'summary'=>'Mướp đắng là loại quả được trồng phổ biến tại Việt Nam. Có lẽ chưa ai trong chúng ta là không từng nếm thử những món ăn được làm từ loại quả này và cũng ít ai có thể hiểu hết được những tác dụng tuyệt vời mà trái mướp đắng mang lại cho sức khỏe con người.',
                'content'=>'<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>1, Mướp đắng l&agrave; loại quả như thế n&agrave;o?</strong></span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif">- Quả mướp đắng c&oacute; t&ecirc;n khoa học l&agrave;: Momordica charantia Linn, thuộc họ nh&agrave; Cucurbitaceae c&ograve;n c&oacute; một t&ecirc;n gọi kh&aacute;c l&agrave; &ldquo;khổ qua&rdquo;. Loại c&acirc;y n&agrave;y được trồng phổ biến tại những khu vực miền n&uacute;i v&agrave; c&aacute;c tỉnh miền Nam Việt Nam.<span style="background-color:#ffffff">&nbsp;Mướp đắng thuộc dạng c&acirc;y leo, mọc ở v&ugrave;ng nhiệt đới v&agrave; cận nhiệt đới, thuộc họ bầu b&iacute;, c&oacute; quả ăn được v&agrave; c&oacute; vị rất đắng so với c&aacute;c loại củ quả kh&aacute;c.</span></span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><span style="background-color:#ffffff">- C&acirc;y mướp đắng c&oacute; th&acirc;n nhỏ đường k&iacute;nh khoảng 3 - 6 mm, l&aacute; kh&aacute; mỏng c&oacute; từ 4-6 cạnh nh&ocirc; ra như mũi gi&aacute;o. Quả mướp đắng sần s&ugrave;i, d&agrave;i khoảng 15-20 cm đường k&iacute;nh khoảng 3-4 cm, c&oacute; vị đắng đặc trưng. Điểm nổi bật của tr&aacute;i mướp đắng (khổ qua) l&agrave; vỏ, thịt quả, ruột v&agrave; hạt đều c&oacute; gi&aacute; trị dinh dưỡng cao ngang nhau, trong đ&oacute; hạt chứa kh&aacute; nhiều chất b&eacute;o. Đặc biệt trong thịt quả mướp đắng chứa nhiều vitamin v&agrave; kho&aacute;ng chất, kali, đặc biệt vitamin C kh&aacute; cao</span>&nbsp;n&ecirc;n c&oacute; nhiều lợi &iacute;ch cho sức khỏe.</span></span></span></span></span></span></p>

<p style="text-align:center"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><a class="view-gallery" href="https://biggreen.vn/upload/20366/fck/files/muop-dang__2_84.jpg" style="box-sizing:border-box; color:#000000; text-decoration:none"><img alt="" src="https://biggreen.vn/upload/20366/fck/files/muop-dang__2_84.jpg" style="border:none; box-sizing:border-box; height:500px; max-width:100%; vertical-align:middle; width:500px" /></a></span></span></span></span></span></span></p>

<p style="text-align:center"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><em><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif">Mướp đắng c&oacute; nhiều t&aacute;c dụng tốt đối với sức khỏe con người</span></span></em></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><strong><span style="background-color:#ffffff">2, Những t&aacute;c dụng tuyệt vời m&agrave; quả mướp đắng mang lại cho sức khỏe con người</span></strong></span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><span style="background-color:#ffffff">Với những dưỡng chất c&oacute; trong c&aacute;c th&agrave;nh phần vỏ, thịt v&agrave; hạt, tr&aacute;i mướp đắng thật sự c&oacute; những &iacute;ch lợi tuyệt vời m&agrave; ch&uacute;ng ta kh&ocirc;ng thể bỏ qua: &nbsp;</span></span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><span style="background-color:#ffffff">-&nbsp;<em>Theo Đ&ocirc;ng y</em>: M</span>ướp đắng c&oacute; vị đắng, lạnh; v&agrave;o tỳ vị t&acirc;m can. T&aacute;c dụng thanh giải nhiệt, minh mục giải độc. D&ugrave;ng cho c&aacute;c trường hợp nhiệt bệnh sốt n&oacute;ng mất nước, hội chứng lỵ, vi&ecirc;m cấp t&iacute;nh đường tiết niệu, sỏi đường tiết niệu, mụn nhọt, đau mắt đỏ, bệnh tiểu đường, ho, vi&ecirc;m họng...v.v</span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><span style="background-color:#ffffff">-&nbsp;<em>Theo y học hiện đại</em>:</span>&nbsp;Mướp đắng c&oacute; t&aacute;c dụng diệt vi khuẩn v&agrave; virus, chống lại c&aacute;c tế b&agrave;o ung thư; hỗ trợ đắc lực cho bệnh nh&acirc;n ung thư đang chữa bằng tia xạ. Trong th&agrave;nh phần dinh dưỡng của mướp đắng c&oacute; nhiều vitamin C với h&agrave;m lượng khoảng 120 mg, cao hơn nhiều so với d&acirc;u t&acirc;y (80 mg) v&agrave; chanh (90 mg); Vitamin C trong mướp đắng gi&uacute;p tăng sức đề kh&aacute;ng cho cơ thể, kh&aacute;ng vi&ecirc;m tốt, ngăn ngừa v&agrave; c&oacute; t&aacute;c dụng ti&ecirc;u diệt tế b&agrave;o ung thư&hellip; Mướp đắng c&ograve;n chứa kali c&oacute; t&aacute;c dụng l&agrave;m giảm huyết &aacute;p, beta-carotene gi&uacute;p s&aacute;ng mắt, ph&ograve;ng ngừa ung thư.</span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif">- Đối với chị em phụ nữ th&igrave; kh&ocirc;ng c&ograve;n lạ lẫm g&igrave; với việc cải thiện l&agrave;n da&nbsp;bằng c&aacute;ch đắp mặt v&agrave; uống nước &eacute;p mướp đắng. Việc n&agrave;y nhằm gi&uacute;p cho da dẻ mịn m&agrave;ng, giảm v&agrave; ti&ecirc;u diệt mụn trứng c&aacute;, mụn đầu đen. Trong loại quả n&agrave;y c&ograve;n c&oacute; nhiều nước v&agrave; vitamin n&ecirc;n da sẽ t&aacute;i tạo rất nhanh. Ngo&agrave;i ra, quả mướp đắng c&ograve;n c&oacute; c&ocirc;ng dụng chữa h&ocirc;i ch&acirc;n, h&ocirc;i n&aacute;ch v&agrave; đặc biệt l&agrave; giảm c&acirc;n cho c&aacute;c chị em rất hữu hiệu.</span></span></span></span></span></span></p>

<p style="text-align:center"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><a class="view-gallery" href="https://biggreen.vn/upload/20366/fck/files/m%C6%B0%E1%BB%9Bp%20%C4%91%E1%BA%AFng.jpg" style="box-sizing:border-box; color:#000000; text-decoration:none"><img alt="" src="https://biggreen.vn/upload/20366/fck/files/m%C6%B0%E1%BB%9Bp%20%C4%91%E1%BA%AFng.jpg" style="border:none; box-sizing:border-box; height:300px; max-width:100%; vertical-align:middle; width:500px" /></a></span></span></span></span></span></span></p>

<p style="text-align:center"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><em><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif">C&oacute; rất nhiều m&oacute;n ăn ngon được l&agrave;m từ mướp đắng</span></span></em></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>3, C&aacute;c loại m&oacute;n ăn c&oacute; thể chế biến từ quả mướp đắng</strong></span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif">- Ăn thường xuy&ecirc;n mướp đắng ch&uacute;ng ta sẽ thấy loại thực phẩm n&agrave;y kh&aacute; ngon v&agrave; lại c&ograve;n bổ dưỡng nữa. Mướp đắng c&oacute; thể kết hợp được với c&aacute;c loại thực phẩm kh&aacute;c tạo n&ecirc;n nhiều m&oacute;n ăn ngon lạ mắt như: Mướp đắng nhồi thịt, mướp đắng x&agrave;o trứng, gỏi mướp đắng, mướp đắng ăn sống với ruốc b&ocirc;ng, mướp đắng x&agrave;o bột tề&hellip; Ngo&agrave;i ra, mướp đắng c&ograve;n được phơi kh&ocirc; d&ugrave;ng l&agrave;m tr&agrave; v&agrave; l&agrave;m mứt.</span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif">- Tuy mướp đắng l&agrave; loại thực phẩm rất tốt cho sức khỏe con người nhưng ch&uacute;ng ta cũng n&ecirc;n biết c&aacute;ch chế biến mướp đắng một c&aacute;ch khoa học v&agrave; kh&ocirc;ng phải ai cũng n&ecirc;n ăn loại quả n&agrave;y thường xuy&ecirc;n: Phụ nữ đang mang thai, mong muốn c&oacute; thai, những người đang bị c&aacute;c bệnh về gan thận, những người đang bị c&aacute;c bệnh về ti&ecirc;u h&oacute;a kh&ocirc;ng n&ecirc;n ăn mướp đắng nhiều.</span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif">Nếu bạn chưa biết cửa h&agrave;ng n&agrave;o c&oacute; bạn loại quả n&agrave;y, hoặc đang lo lắng về xuất xứ nguồn gốc, chất lượng của mướp đắng tại c&aacute;c cửa h&agrave;ng thực phẩm th&igrave; h&atilde;y đến với&nbsp;<strong>Biggreen</strong>. Những tr&aacute;i mướp đắng của ch&uacute;ng t&ocirc;i lu&ocirc;n tươi ngon v&agrave; được nhập từ c&aacute;c n&ocirc;ng trại sạch của Đ&agrave; Lạt n&ecirc;n đảm bảo về nguồn gốc cũng như chất lượng sản phẩm.</span></span></span></span></span></span></p>

<p>&nbsp;</p>',
                'focus'=>1,
                'view'=>10,
                'cate_id'=>1,
                'created_at'=>now(),
                'status'=>1,
            ]);
        }
        for ($i = 0; $i < 10; $i++)
        {
            DB::table('news')->insert([
                'name'=>'Tại sao chúng ta nên ăn thường xuyên quả mướp đắng?',
                'slug'=>'tai-sao-chung-ta-nen-an-thuong-xuyen-qua-muop-dang',
                'image'=>'AORj_image_muop-dang__2_84.jpg',
                'summary'=>'Mướp đắng là loại quả được trồng phổ biến tại Việt Nam. Có lẽ chưa ai trong chúng ta là không từng nếm thử những món ăn được làm từ loại quả này và cũng ít ai có thể hiểu hết được những tác dụng tuyệt vời mà trái mướp đắng mang lại cho sức khỏe con người.',
                'content'=>'<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>1, Mướp đắng l&agrave; loại quả như thế n&agrave;o?</strong></span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif">- Quả mướp đắng c&oacute; t&ecirc;n khoa học l&agrave;: Momordica charantia Linn, thuộc họ nh&agrave; Cucurbitaceae c&ograve;n c&oacute; một t&ecirc;n gọi kh&aacute;c l&agrave; &ldquo;khổ qua&rdquo;. Loại c&acirc;y n&agrave;y được trồng phổ biến tại những khu vực miền n&uacute;i v&agrave; c&aacute;c tỉnh miền Nam Việt Nam.<span style="background-color:#ffffff">&nbsp;Mướp đắng thuộc dạng c&acirc;y leo, mọc ở v&ugrave;ng nhiệt đới v&agrave; cận nhiệt đới, thuộc họ bầu b&iacute;, c&oacute; quả ăn được v&agrave; c&oacute; vị rất đắng so với c&aacute;c loại củ quả kh&aacute;c.</span></span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><span style="background-color:#ffffff">- C&acirc;y mướp đắng c&oacute; th&acirc;n nhỏ đường k&iacute;nh khoảng 3 - 6 mm, l&aacute; kh&aacute; mỏng c&oacute; từ 4-6 cạnh nh&ocirc; ra như mũi gi&aacute;o. Quả mướp đắng sần s&ugrave;i, d&agrave;i khoảng 15-20 cm đường k&iacute;nh khoảng 3-4 cm, c&oacute; vị đắng đặc trưng. Điểm nổi bật của tr&aacute;i mướp đắng (khổ qua) l&agrave; vỏ, thịt quả, ruột v&agrave; hạt đều c&oacute; gi&aacute; trị dinh dưỡng cao ngang nhau, trong đ&oacute; hạt chứa kh&aacute; nhiều chất b&eacute;o. Đặc biệt trong thịt quả mướp đắng chứa nhiều vitamin v&agrave; kho&aacute;ng chất, kali, đặc biệt vitamin C kh&aacute; cao</span>&nbsp;n&ecirc;n c&oacute; nhiều lợi &iacute;ch cho sức khỏe.</span></span></span></span></span></span></p>

<p style="text-align:center"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><a class="view-gallery" href="https://biggreen.vn/upload/20366/fck/files/muop-dang__2_84.jpg" style="box-sizing:border-box; color:#000000; text-decoration:none"><img alt="" src="https://biggreen.vn/upload/20366/fck/files/muop-dang__2_84.jpg" style="border:none; box-sizing:border-box; height:500px; max-width:100%; vertical-align:middle; width:500px" /></a></span></span></span></span></span></span></p>

<p style="text-align:center"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><em><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif">Mướp đắng c&oacute; nhiều t&aacute;c dụng tốt đối với sức khỏe con người</span></span></em></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><strong><span style="background-color:#ffffff">2, Những t&aacute;c dụng tuyệt vời m&agrave; quả mướp đắng mang lại cho sức khỏe con người</span></strong></span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><span style="background-color:#ffffff">Với những dưỡng chất c&oacute; trong c&aacute;c th&agrave;nh phần vỏ, thịt v&agrave; hạt, tr&aacute;i mướp đắng thật sự c&oacute; những &iacute;ch lợi tuyệt vời m&agrave; ch&uacute;ng ta kh&ocirc;ng thể bỏ qua: &nbsp;</span></span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><span style="background-color:#ffffff">-&nbsp;<em>Theo Đ&ocirc;ng y</em>: M</span>ướp đắng c&oacute; vị đắng, lạnh; v&agrave;o tỳ vị t&acirc;m can. T&aacute;c dụng thanh giải nhiệt, minh mục giải độc. D&ugrave;ng cho c&aacute;c trường hợp nhiệt bệnh sốt n&oacute;ng mất nước, hội chứng lỵ, vi&ecirc;m cấp t&iacute;nh đường tiết niệu, sỏi đường tiết niệu, mụn nhọt, đau mắt đỏ, bệnh tiểu đường, ho, vi&ecirc;m họng...v.v</span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><span style="background-color:#ffffff">-&nbsp;<em>Theo y học hiện đại</em>:</span>&nbsp;Mướp đắng c&oacute; t&aacute;c dụng diệt vi khuẩn v&agrave; virus, chống lại c&aacute;c tế b&agrave;o ung thư; hỗ trợ đắc lực cho bệnh nh&acirc;n ung thư đang chữa bằng tia xạ. Trong th&agrave;nh phần dinh dưỡng của mướp đắng c&oacute; nhiều vitamin C với h&agrave;m lượng khoảng 120 mg, cao hơn nhiều so với d&acirc;u t&acirc;y (80 mg) v&agrave; chanh (90 mg); Vitamin C trong mướp đắng gi&uacute;p tăng sức đề kh&aacute;ng cho cơ thể, kh&aacute;ng vi&ecirc;m tốt, ngăn ngừa v&agrave; c&oacute; t&aacute;c dụng ti&ecirc;u diệt tế b&agrave;o ung thư&hellip; Mướp đắng c&ograve;n chứa kali c&oacute; t&aacute;c dụng l&agrave;m giảm huyết &aacute;p, beta-carotene gi&uacute;p s&aacute;ng mắt, ph&ograve;ng ngừa ung thư.</span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif">- Đối với chị em phụ nữ th&igrave; kh&ocirc;ng c&ograve;n lạ lẫm g&igrave; với việc cải thiện l&agrave;n da&nbsp;bằng c&aacute;ch đắp mặt v&agrave; uống nước &eacute;p mướp đắng. Việc n&agrave;y nhằm gi&uacute;p cho da dẻ mịn m&agrave;ng, giảm v&agrave; ti&ecirc;u diệt mụn trứng c&aacute;, mụn đầu đen. Trong loại quả n&agrave;y c&ograve;n c&oacute; nhiều nước v&agrave; vitamin n&ecirc;n da sẽ t&aacute;i tạo rất nhanh. Ngo&agrave;i ra, quả mướp đắng c&ograve;n c&oacute; c&ocirc;ng dụng chữa h&ocirc;i ch&acirc;n, h&ocirc;i n&aacute;ch v&agrave; đặc biệt l&agrave; giảm c&acirc;n cho c&aacute;c chị em rất hữu hiệu.</span></span></span></span></span></span></p>

<p style="text-align:center"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><a class="view-gallery" href="https://biggreen.vn/upload/20366/fck/files/m%C6%B0%E1%BB%9Bp%20%C4%91%E1%BA%AFng.jpg" style="box-sizing:border-box; color:#000000; text-decoration:none"><img alt="" src="https://biggreen.vn/upload/20366/fck/files/m%C6%B0%E1%BB%9Bp%20%C4%91%E1%BA%AFng.jpg" style="border:none; box-sizing:border-box; height:300px; max-width:100%; vertical-align:middle; width:500px" /></a></span></span></span></span></span></span></p>

<p style="text-align:center"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><em><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif">C&oacute; rất nhiều m&oacute;n ăn ngon được l&agrave;m từ mướp đắng</span></span></em></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>3, C&aacute;c loại m&oacute;n ăn c&oacute; thể chế biến từ quả mướp đắng</strong></span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif">- Ăn thường xuy&ecirc;n mướp đắng ch&uacute;ng ta sẽ thấy loại thực phẩm n&agrave;y kh&aacute; ngon v&agrave; lại c&ograve;n bổ dưỡng nữa. Mướp đắng c&oacute; thể kết hợp được với c&aacute;c loại thực phẩm kh&aacute;c tạo n&ecirc;n nhiều m&oacute;n ăn ngon lạ mắt như: Mướp đắng nhồi thịt, mướp đắng x&agrave;o trứng, gỏi mướp đắng, mướp đắng ăn sống với ruốc b&ocirc;ng, mướp đắng x&agrave;o bột tề&hellip; Ngo&agrave;i ra, mướp đắng c&ograve;n được phơi kh&ocirc; d&ugrave;ng l&agrave;m tr&agrave; v&agrave; l&agrave;m mứt.</span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif">- Tuy mướp đắng l&agrave; loại thực phẩm rất tốt cho sức khỏe con người nhưng ch&uacute;ng ta cũng n&ecirc;n biết c&aacute;ch chế biến mướp đắng một c&aacute;ch khoa học v&agrave; kh&ocirc;ng phải ai cũng n&ecirc;n ăn loại quả n&agrave;y thường xuy&ecirc;n: Phụ nữ đang mang thai, mong muốn c&oacute; thai, những người đang bị c&aacute;c bệnh về gan thận, những người đang bị c&aacute;c bệnh về ti&ecirc;u h&oacute;a kh&ocirc;ng n&ecirc;n ăn mướp đắng nhiều.</span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif">Nếu bạn chưa biết cửa h&agrave;ng n&agrave;o c&oacute; bạn loại quả n&agrave;y, hoặc đang lo lắng về xuất xứ nguồn gốc, chất lượng của mướp đắng tại c&aacute;c cửa h&agrave;ng thực phẩm th&igrave; h&atilde;y đến với&nbsp;<strong>Biggreen</strong>. Những tr&aacute;i mướp đắng của ch&uacute;ng t&ocirc;i lu&ocirc;n tươi ngon v&agrave; được nhập từ c&aacute;c n&ocirc;ng trại sạch của Đ&agrave; Lạt n&ecirc;n đảm bảo về nguồn gốc cũng như chất lượng sản phẩm.</span></span></span></span></span></span></p>

<p>&nbsp;</p>',
                'focus'=>1,
                'view'=>10,
                'cate_id'=>2,
                'created_at'=>now(),
                'status'=>1,
            ]);
        }
        for ($i = 0; $i < 10; $i++)
        {
            DB::table('news')->insert([
                'name'=>'Tại sao chúng ta nên ăn thường xuyên quả mướp đắng?',
                'slug'=>'tai-sao-chung-ta-nen-an-thuong-xuyen-qua-muop-dang',
                'image'=>'AORj_image_muop-dang__2_84.jpg',
                'summary'=>'Mướp đắng là loại quả được trồng phổ biến tại Việt Nam. Có lẽ chưa ai trong chúng ta là không từng nếm thử những món ăn được làm từ loại quả này và cũng ít ai có thể hiểu hết được những tác dụng tuyệt vời mà trái mướp đắng mang lại cho sức khỏe con người.',
                'content'=>'<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>1, Mướp đắng l&agrave; loại quả như thế n&agrave;o?</strong></span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif">- Quả mướp đắng c&oacute; t&ecirc;n khoa học l&agrave;: Momordica charantia Linn, thuộc họ nh&agrave; Cucurbitaceae c&ograve;n c&oacute; một t&ecirc;n gọi kh&aacute;c l&agrave; &ldquo;khổ qua&rdquo;. Loại c&acirc;y n&agrave;y được trồng phổ biến tại những khu vực miền n&uacute;i v&agrave; c&aacute;c tỉnh miền Nam Việt Nam.<span style="background-color:#ffffff">&nbsp;Mướp đắng thuộc dạng c&acirc;y leo, mọc ở v&ugrave;ng nhiệt đới v&agrave; cận nhiệt đới, thuộc họ bầu b&iacute;, c&oacute; quả ăn được v&agrave; c&oacute; vị rất đắng so với c&aacute;c loại củ quả kh&aacute;c.</span></span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><span style="background-color:#ffffff">- C&acirc;y mướp đắng c&oacute; th&acirc;n nhỏ đường k&iacute;nh khoảng 3 - 6 mm, l&aacute; kh&aacute; mỏng c&oacute; từ 4-6 cạnh nh&ocirc; ra như mũi gi&aacute;o. Quả mướp đắng sần s&ugrave;i, d&agrave;i khoảng 15-20 cm đường k&iacute;nh khoảng 3-4 cm, c&oacute; vị đắng đặc trưng. Điểm nổi bật của tr&aacute;i mướp đắng (khổ qua) l&agrave; vỏ, thịt quả, ruột v&agrave; hạt đều c&oacute; gi&aacute; trị dinh dưỡng cao ngang nhau, trong đ&oacute; hạt chứa kh&aacute; nhiều chất b&eacute;o. Đặc biệt trong thịt quả mướp đắng chứa nhiều vitamin v&agrave; kho&aacute;ng chất, kali, đặc biệt vitamin C kh&aacute; cao</span>&nbsp;n&ecirc;n c&oacute; nhiều lợi &iacute;ch cho sức khỏe.</span></span></span></span></span></span></p>

<p style="text-align:center"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><a class="view-gallery" href="https://biggreen.vn/upload/20366/fck/files/muop-dang__2_84.jpg" style="box-sizing:border-box; color:#000000; text-decoration:none"><img alt="" src="https://biggreen.vn/upload/20366/fck/files/muop-dang__2_84.jpg" style="border:none; box-sizing:border-box; height:500px; max-width:100%; vertical-align:middle; width:500px" /></a></span></span></span></span></span></span></p>

<p style="text-align:center"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><em><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif">Mướp đắng c&oacute; nhiều t&aacute;c dụng tốt đối với sức khỏe con người</span></span></em></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><strong><span style="background-color:#ffffff">2, Những t&aacute;c dụng tuyệt vời m&agrave; quả mướp đắng mang lại cho sức khỏe con người</span></strong></span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><span style="background-color:#ffffff">Với những dưỡng chất c&oacute; trong c&aacute;c th&agrave;nh phần vỏ, thịt v&agrave; hạt, tr&aacute;i mướp đắng thật sự c&oacute; những &iacute;ch lợi tuyệt vời m&agrave; ch&uacute;ng ta kh&ocirc;ng thể bỏ qua: &nbsp;</span></span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><span style="background-color:#ffffff">-&nbsp;<em>Theo Đ&ocirc;ng y</em>: M</span>ướp đắng c&oacute; vị đắng, lạnh; v&agrave;o tỳ vị t&acirc;m can. T&aacute;c dụng thanh giải nhiệt, minh mục giải độc. D&ugrave;ng cho c&aacute;c trường hợp nhiệt bệnh sốt n&oacute;ng mất nước, hội chứng lỵ, vi&ecirc;m cấp t&iacute;nh đường tiết niệu, sỏi đường tiết niệu, mụn nhọt, đau mắt đỏ, bệnh tiểu đường, ho, vi&ecirc;m họng...v.v</span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><span style="background-color:#ffffff">-&nbsp;<em>Theo y học hiện đại</em>:</span>&nbsp;Mướp đắng c&oacute; t&aacute;c dụng diệt vi khuẩn v&agrave; virus, chống lại c&aacute;c tế b&agrave;o ung thư; hỗ trợ đắc lực cho bệnh nh&acirc;n ung thư đang chữa bằng tia xạ. Trong th&agrave;nh phần dinh dưỡng của mướp đắng c&oacute; nhiều vitamin C với h&agrave;m lượng khoảng 120 mg, cao hơn nhiều so với d&acirc;u t&acirc;y (80 mg) v&agrave; chanh (90 mg); Vitamin C trong mướp đắng gi&uacute;p tăng sức đề kh&aacute;ng cho cơ thể, kh&aacute;ng vi&ecirc;m tốt, ngăn ngừa v&agrave; c&oacute; t&aacute;c dụng ti&ecirc;u diệt tế b&agrave;o ung thư&hellip; Mướp đắng c&ograve;n chứa kali c&oacute; t&aacute;c dụng l&agrave;m giảm huyết &aacute;p, beta-carotene gi&uacute;p s&aacute;ng mắt, ph&ograve;ng ngừa ung thư.</span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif">- Đối với chị em phụ nữ th&igrave; kh&ocirc;ng c&ograve;n lạ lẫm g&igrave; với việc cải thiện l&agrave;n da&nbsp;bằng c&aacute;ch đắp mặt v&agrave; uống nước &eacute;p mướp đắng. Việc n&agrave;y nhằm gi&uacute;p cho da dẻ mịn m&agrave;ng, giảm v&agrave; ti&ecirc;u diệt mụn trứng c&aacute;, mụn đầu đen. Trong loại quả n&agrave;y c&ograve;n c&oacute; nhiều nước v&agrave; vitamin n&ecirc;n da sẽ t&aacute;i tạo rất nhanh. Ngo&agrave;i ra, quả mướp đắng c&ograve;n c&oacute; c&ocirc;ng dụng chữa h&ocirc;i ch&acirc;n, h&ocirc;i n&aacute;ch v&agrave; đặc biệt l&agrave; giảm c&acirc;n cho c&aacute;c chị em rất hữu hiệu.</span></span></span></span></span></span></p>

<p style="text-align:center"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><a class="view-gallery" href="https://biggreen.vn/upload/20366/fck/files/m%C6%B0%E1%BB%9Bp%20%C4%91%E1%BA%AFng.jpg" style="box-sizing:border-box; color:#000000; text-decoration:none"><img alt="" src="https://biggreen.vn/upload/20366/fck/files/m%C6%B0%E1%BB%9Bp%20%C4%91%E1%BA%AFng.jpg" style="border:none; box-sizing:border-box; height:300px; max-width:100%; vertical-align:middle; width:500px" /></a></span></span></span></span></span></span></p>

<p style="text-align:center"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><em><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif">C&oacute; rất nhiều m&oacute;n ăn ngon được l&agrave;m từ mướp đắng</span></span></em></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>3, C&aacute;c loại m&oacute;n ăn c&oacute; thể chế biến từ quả mướp đắng</strong></span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif">- Ăn thường xuy&ecirc;n mướp đắng ch&uacute;ng ta sẽ thấy loại thực phẩm n&agrave;y kh&aacute; ngon v&agrave; lại c&ograve;n bổ dưỡng nữa. Mướp đắng c&oacute; thể kết hợp được với c&aacute;c loại thực phẩm kh&aacute;c tạo n&ecirc;n nhiều m&oacute;n ăn ngon lạ mắt như: Mướp đắng nhồi thịt, mướp đắng x&agrave;o trứng, gỏi mướp đắng, mướp đắng ăn sống với ruốc b&ocirc;ng, mướp đắng x&agrave;o bột tề&hellip; Ngo&agrave;i ra, mướp đắng c&ograve;n được phơi kh&ocirc; d&ugrave;ng l&agrave;m tr&agrave; v&agrave; l&agrave;m mứt.</span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif">- Tuy mướp đắng l&agrave; loại thực phẩm rất tốt cho sức khỏe con người nhưng ch&uacute;ng ta cũng n&ecirc;n biết c&aacute;ch chế biến mướp đắng một c&aacute;ch khoa học v&agrave; kh&ocirc;ng phải ai cũng n&ecirc;n ăn loại quả n&agrave;y thường xuy&ecirc;n: Phụ nữ đang mang thai, mong muốn c&oacute; thai, những người đang bị c&aacute;c bệnh về gan thận, những người đang bị c&aacute;c bệnh về ti&ecirc;u h&oacute;a kh&ocirc;ng n&ecirc;n ăn mướp đắng nhiều.</span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif">Nếu bạn chưa biết cửa h&agrave;ng n&agrave;o c&oacute; bạn loại quả n&agrave;y, hoặc đang lo lắng về xuất xứ nguồn gốc, chất lượng của mướp đắng tại c&aacute;c cửa h&agrave;ng thực phẩm th&igrave; h&atilde;y đến với&nbsp;<strong>Biggreen</strong>. Những tr&aacute;i mướp đắng của ch&uacute;ng t&ocirc;i lu&ocirc;n tươi ngon v&agrave; được nhập từ c&aacute;c n&ocirc;ng trại sạch của Đ&agrave; Lạt n&ecirc;n đảm bảo về nguồn gốc cũng như chất lượng sản phẩm.</span></span></span></span></span></span></p>

<p>&nbsp;</p>',
                'focus'=>1,
                'view'=>10,
                'cate_id'=>3,
                'created_at'=>now(),
                'status'=>1,
            ]);
        }
//        Database menu
        $cate_menu =array('Một ngày vui vẻ','Cả tuần vui vẻ','Cả năm vui vẻ');
        for ($i = 0; $i < 3; $i++)
        {
            DB::table('cate_menu')->insert([
                'name' => $cate_menu[$i],
                'slug'=>str_slug($cate_menu[$i]),
                'created_at'=>now(),
            ]);
        }
        for ($i = 0; $i < 10; $i++)
        {
            DB::table('menu')->insert([
                'name'=>'Tại sao chúng ta nên ăn thường xuyên quả mướp đắng?',
                'slug'=>'tai-sao-chung-ta-nen-an-thuong-xuyen-qua-muop-dang',
                'image'=>'BGm6_image_giỏ hoa quả đẹp.jpg',
                'summary'=>'Mướp đắng là loại quả được trồng phổ biến tại Việt Nam. Có lẽ chưa ai trong chúng ta là không từng nếm thử những món ăn được làm từ loại quả này và cũng ít ai có thể hiểu hết được những tác dụng tuyệt vời mà trái mướp đắng mang lại cho sức khỏe con người.',
                'content'=>'<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>1, Mướp đắng l&agrave; loại quả như thế n&agrave;o?</strong></span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif">- Quả mướp đắng c&oacute; t&ecirc;n khoa học l&agrave;: Momordica charantia Linn, thuộc họ nh&agrave; Cucurbitaceae c&ograve;n c&oacute; một t&ecirc;n gọi kh&aacute;c l&agrave; &ldquo;khổ qua&rdquo;. Loại c&acirc;y n&agrave;y được trồng phổ biến tại những khu vực miền n&uacute;i v&agrave; c&aacute;c tỉnh miền Nam Việt Nam.<span style="background-color:#ffffff">&nbsp;Mướp đắng thuộc dạng c&acirc;y leo, mọc ở v&ugrave;ng nhiệt đới v&agrave; cận nhiệt đới, thuộc họ bầu b&iacute;, c&oacute; quả ăn được v&agrave; c&oacute; vị rất đắng so với c&aacute;c loại củ quả kh&aacute;c.</span></span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><span style="background-color:#ffffff">- C&acirc;y mướp đắng c&oacute; th&acirc;n nhỏ đường k&iacute;nh khoảng 3 - 6 mm, l&aacute; kh&aacute; mỏng c&oacute; từ 4-6 cạnh nh&ocirc; ra như mũi gi&aacute;o. Quả mướp đắng sần s&ugrave;i, d&agrave;i khoảng 15-20 cm đường k&iacute;nh khoảng 3-4 cm, c&oacute; vị đắng đặc trưng. Điểm nổi bật của tr&aacute;i mướp đắng (khổ qua) l&agrave; vỏ, thịt quả, ruột v&agrave; hạt đều c&oacute; gi&aacute; trị dinh dưỡng cao ngang nhau, trong đ&oacute; hạt chứa kh&aacute; nhiều chất b&eacute;o. Đặc biệt trong thịt quả mướp đắng chứa nhiều vitamin v&agrave; kho&aacute;ng chất, kali, đặc biệt vitamin C kh&aacute; cao</span>&nbsp;n&ecirc;n c&oacute; nhiều lợi &iacute;ch cho sức khỏe.</span></span></span></span></span></span></p>

<p style="text-align:center"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><a class="view-gallery" href="https://biggreen.vn/upload/20366/fck/files/muop-dang__2_84.jpg" style="box-sizing:border-box; color:#000000; text-decoration:none"><img alt="" src="https://biggreen.vn/upload/20366/fck/files/muop-dang__2_84.jpg" style="border:none; box-sizing:border-box; height:500px; max-width:100%; vertical-align:middle; width:500px" /></a></span></span></span></span></span></span></p>

<p style="text-align:center"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><em><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif">Mướp đắng c&oacute; nhiều t&aacute;c dụng tốt đối với sức khỏe con người</span></span></em></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><strong><span style="background-color:#ffffff">2, Những t&aacute;c dụng tuyệt vời m&agrave; quả mướp đắng mang lại cho sức khỏe con người</span></strong></span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><span style="background-color:#ffffff">Với những dưỡng chất c&oacute; trong c&aacute;c th&agrave;nh phần vỏ, thịt v&agrave; hạt, tr&aacute;i mướp đắng thật sự c&oacute; những &iacute;ch lợi tuyệt vời m&agrave; ch&uacute;ng ta kh&ocirc;ng thể bỏ qua: &nbsp;</span></span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><span style="background-color:#ffffff">-&nbsp;<em>Theo Đ&ocirc;ng y</em>: M</span>ướp đắng c&oacute; vị đắng, lạnh; v&agrave;o tỳ vị t&acirc;m can. T&aacute;c dụng thanh giải nhiệt, minh mục giải độc. D&ugrave;ng cho c&aacute;c trường hợp nhiệt bệnh sốt n&oacute;ng mất nước, hội chứng lỵ, vi&ecirc;m cấp t&iacute;nh đường tiết niệu, sỏi đường tiết niệu, mụn nhọt, đau mắt đỏ, bệnh tiểu đường, ho, vi&ecirc;m họng...v.v</span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><span style="background-color:#ffffff">-&nbsp;<em>Theo y học hiện đại</em>:</span>&nbsp;Mướp đắng c&oacute; t&aacute;c dụng diệt vi khuẩn v&agrave; virus, chống lại c&aacute;c tế b&agrave;o ung thư; hỗ trợ đắc lực cho bệnh nh&acirc;n ung thư đang chữa bằng tia xạ. Trong th&agrave;nh phần dinh dưỡng của mướp đắng c&oacute; nhiều vitamin C với h&agrave;m lượng khoảng 120 mg, cao hơn nhiều so với d&acirc;u t&acirc;y (80 mg) v&agrave; chanh (90 mg); Vitamin C trong mướp đắng gi&uacute;p tăng sức đề kh&aacute;ng cho cơ thể, kh&aacute;ng vi&ecirc;m tốt, ngăn ngừa v&agrave; c&oacute; t&aacute;c dụng ti&ecirc;u diệt tế b&agrave;o ung thư&hellip; Mướp đắng c&ograve;n chứa kali c&oacute; t&aacute;c dụng l&agrave;m giảm huyết &aacute;p, beta-carotene gi&uacute;p s&aacute;ng mắt, ph&ograve;ng ngừa ung thư.</span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif">- Đối với chị em phụ nữ th&igrave; kh&ocirc;ng c&ograve;n lạ lẫm g&igrave; với việc cải thiện l&agrave;n da&nbsp;bằng c&aacute;ch đắp mặt v&agrave; uống nước &eacute;p mướp đắng. Việc n&agrave;y nhằm gi&uacute;p cho da dẻ mịn m&agrave;ng, giảm v&agrave; ti&ecirc;u diệt mụn trứng c&aacute;, mụn đầu đen. Trong loại quả n&agrave;y c&ograve;n c&oacute; nhiều nước v&agrave; vitamin n&ecirc;n da sẽ t&aacute;i tạo rất nhanh. Ngo&agrave;i ra, quả mướp đắng c&ograve;n c&oacute; c&ocirc;ng dụng chữa h&ocirc;i ch&acirc;n, h&ocirc;i n&aacute;ch v&agrave; đặc biệt l&agrave; giảm c&acirc;n cho c&aacute;c chị em rất hữu hiệu.</span></span></span></span></span></span></p>

<p style="text-align:center"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><a class="view-gallery" href="https://biggreen.vn/upload/20366/fck/files/m%C6%B0%E1%BB%9Bp%20%C4%91%E1%BA%AFng.jpg" style="box-sizing:border-box; color:#000000; text-decoration:none"><img alt="" src="https://biggreen.vn/upload/20366/fck/files/m%C6%B0%E1%BB%9Bp%20%C4%91%E1%BA%AFng.jpg" style="border:none; box-sizing:border-box; height:300px; max-width:100%; vertical-align:middle; width:500px" /></a></span></span></span></span></span></span></p>

<p style="text-align:center"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><em><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif">C&oacute; rất nhiều m&oacute;n ăn ngon được l&agrave;m từ mướp đắng</span></span></em></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>3, C&aacute;c loại m&oacute;n ăn c&oacute; thể chế biến từ quả mướp đắng</strong></span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif">- Ăn thường xuy&ecirc;n mướp đắng ch&uacute;ng ta sẽ thấy loại thực phẩm n&agrave;y kh&aacute; ngon v&agrave; lại c&ograve;n bổ dưỡng nữa. Mướp đắng c&oacute; thể kết hợp được với c&aacute;c loại thực phẩm kh&aacute;c tạo n&ecirc;n nhiều m&oacute;n ăn ngon lạ mắt như: Mướp đắng nhồi thịt, mướp đắng x&agrave;o trứng, gỏi mướp đắng, mướp đắng ăn sống với ruốc b&ocirc;ng, mướp đắng x&agrave;o bột tề&hellip; Ngo&agrave;i ra, mướp đắng c&ograve;n được phơi kh&ocirc; d&ugrave;ng l&agrave;m tr&agrave; v&agrave; l&agrave;m mứt.</span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif">- Tuy mướp đắng l&agrave; loại thực phẩm rất tốt cho sức khỏe con người nhưng ch&uacute;ng ta cũng n&ecirc;n biết c&aacute;ch chế biến mướp đắng một c&aacute;ch khoa học v&agrave; kh&ocirc;ng phải ai cũng n&ecirc;n ăn loại quả n&agrave;y thường xuy&ecirc;n: Phụ nữ đang mang thai, mong muốn c&oacute; thai, những người đang bị c&aacute;c bệnh về gan thận, những người đang bị c&aacute;c bệnh về ti&ecirc;u h&oacute;a kh&ocirc;ng n&ecirc;n ăn mướp đắng nhiều.</span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif">Nếu bạn chưa biết cửa h&agrave;ng n&agrave;o c&oacute; bạn loại quả n&agrave;y, hoặc đang lo lắng về xuất xứ nguồn gốc, chất lượng của mướp đắng tại c&aacute;c cửa h&agrave;ng thực phẩm th&igrave; h&atilde;y đến với&nbsp;<strong>Biggreen</strong>. Những tr&aacute;i mướp đắng của ch&uacute;ng t&ocirc;i lu&ocirc;n tươi ngon v&agrave; được nhập từ c&aacute;c n&ocirc;ng trại sạch của Đ&agrave; Lạt n&ecirc;n đảm bảo về nguồn gốc cũng như chất lượng sản phẩm.</span></span></span></span></span></span></p>

<p>&nbsp;</p>',
                'focus'=>1,
                'view'=>10,
                'cate_id'=>1,
                'created_at'=>now(),
                'status'=>1,
            ]);
        }
        for ($i = 0; $i < 10; $i++)
        {
            DB::table('menu')->insert([
                'name'=>'Tại sao chúng ta nên ăn thường xuyên quả mướp đắng?',
                'slug'=>'tai-sao-chung-ta-nen-an-thuong-xuyen-qua-muop-dang',
                'image'=>'BGm6_image_giỏ hoa quả đẹp.jpg',
                'summary'=>'Mướp đắng là loại quả được trồng phổ biến tại Việt Nam. Có lẽ chưa ai trong chúng ta là không từng nếm thử những món ăn được làm từ loại quả này và cũng ít ai có thể hiểu hết được những tác dụng tuyệt vời mà trái mướp đắng mang lại cho sức khỏe con người.',
                'content'=>'<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>1, Mướp đắng l&agrave; loại quả như thế n&agrave;o?</strong></span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif">- Quả mướp đắng c&oacute; t&ecirc;n khoa học l&agrave;: Momordica charantia Linn, thuộc họ nh&agrave; Cucurbitaceae c&ograve;n c&oacute; một t&ecirc;n gọi kh&aacute;c l&agrave; &ldquo;khổ qua&rdquo;. Loại c&acirc;y n&agrave;y được trồng phổ biến tại những khu vực miền n&uacute;i v&agrave; c&aacute;c tỉnh miền Nam Việt Nam.<span style="background-color:#ffffff">&nbsp;Mướp đắng thuộc dạng c&acirc;y leo, mọc ở v&ugrave;ng nhiệt đới v&agrave; cận nhiệt đới, thuộc họ bầu b&iacute;, c&oacute; quả ăn được v&agrave; c&oacute; vị rất đắng so với c&aacute;c loại củ quả kh&aacute;c.</span></span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><span style="background-color:#ffffff">- C&acirc;y mướp đắng c&oacute; th&acirc;n nhỏ đường k&iacute;nh khoảng 3 - 6 mm, l&aacute; kh&aacute; mỏng c&oacute; từ 4-6 cạnh nh&ocirc; ra như mũi gi&aacute;o. Quả mướp đắng sần s&ugrave;i, d&agrave;i khoảng 15-20 cm đường k&iacute;nh khoảng 3-4 cm, c&oacute; vị đắng đặc trưng. Điểm nổi bật của tr&aacute;i mướp đắng (khổ qua) l&agrave; vỏ, thịt quả, ruột v&agrave; hạt đều c&oacute; gi&aacute; trị dinh dưỡng cao ngang nhau, trong đ&oacute; hạt chứa kh&aacute; nhiều chất b&eacute;o. Đặc biệt trong thịt quả mướp đắng chứa nhiều vitamin v&agrave; kho&aacute;ng chất, kali, đặc biệt vitamin C kh&aacute; cao</span>&nbsp;n&ecirc;n c&oacute; nhiều lợi &iacute;ch cho sức khỏe.</span></span></span></span></span></span></p>

<p style="text-align:center"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><a class="view-gallery" href="https://biggreen.vn/upload/20366/fck/files/muop-dang__2_84.jpg" style="box-sizing:border-box; color:#000000; text-decoration:none"><img alt="" src="https://biggreen.vn/upload/20366/fck/files/muop-dang__2_84.jpg" style="border:none; box-sizing:border-box; height:500px; max-width:100%; vertical-align:middle; width:500px" /></a></span></span></span></span></span></span></p>

<p style="text-align:center"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><em><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif">Mướp đắng c&oacute; nhiều t&aacute;c dụng tốt đối với sức khỏe con người</span></span></em></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><strong><span style="background-color:#ffffff">2, Những t&aacute;c dụng tuyệt vời m&agrave; quả mướp đắng mang lại cho sức khỏe con người</span></strong></span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><span style="background-color:#ffffff">Với những dưỡng chất c&oacute; trong c&aacute;c th&agrave;nh phần vỏ, thịt v&agrave; hạt, tr&aacute;i mướp đắng thật sự c&oacute; những &iacute;ch lợi tuyệt vời m&agrave; ch&uacute;ng ta kh&ocirc;ng thể bỏ qua: &nbsp;</span></span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><span style="background-color:#ffffff">-&nbsp;<em>Theo Đ&ocirc;ng y</em>: M</span>ướp đắng c&oacute; vị đắng, lạnh; v&agrave;o tỳ vị t&acirc;m can. T&aacute;c dụng thanh giải nhiệt, minh mục giải độc. D&ugrave;ng cho c&aacute;c trường hợp nhiệt bệnh sốt n&oacute;ng mất nước, hội chứng lỵ, vi&ecirc;m cấp t&iacute;nh đường tiết niệu, sỏi đường tiết niệu, mụn nhọt, đau mắt đỏ, bệnh tiểu đường, ho, vi&ecirc;m họng...v.v</span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><span style="background-color:#ffffff">-&nbsp;<em>Theo y học hiện đại</em>:</span>&nbsp;Mướp đắng c&oacute; t&aacute;c dụng diệt vi khuẩn v&agrave; virus, chống lại c&aacute;c tế b&agrave;o ung thư; hỗ trợ đắc lực cho bệnh nh&acirc;n ung thư đang chữa bằng tia xạ. Trong th&agrave;nh phần dinh dưỡng của mướp đắng c&oacute; nhiều vitamin C với h&agrave;m lượng khoảng 120 mg, cao hơn nhiều so với d&acirc;u t&acirc;y (80 mg) v&agrave; chanh (90 mg); Vitamin C trong mướp đắng gi&uacute;p tăng sức đề kh&aacute;ng cho cơ thể, kh&aacute;ng vi&ecirc;m tốt, ngăn ngừa v&agrave; c&oacute; t&aacute;c dụng ti&ecirc;u diệt tế b&agrave;o ung thư&hellip; Mướp đắng c&ograve;n chứa kali c&oacute; t&aacute;c dụng l&agrave;m giảm huyết &aacute;p, beta-carotene gi&uacute;p s&aacute;ng mắt, ph&ograve;ng ngừa ung thư.</span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif">- Đối với chị em phụ nữ th&igrave; kh&ocirc;ng c&ograve;n lạ lẫm g&igrave; với việc cải thiện l&agrave;n da&nbsp;bằng c&aacute;ch đắp mặt v&agrave; uống nước &eacute;p mướp đắng. Việc n&agrave;y nhằm gi&uacute;p cho da dẻ mịn m&agrave;ng, giảm v&agrave; ti&ecirc;u diệt mụn trứng c&aacute;, mụn đầu đen. Trong loại quả n&agrave;y c&ograve;n c&oacute; nhiều nước v&agrave; vitamin n&ecirc;n da sẽ t&aacute;i tạo rất nhanh. Ngo&agrave;i ra, quả mướp đắng c&ograve;n c&oacute; c&ocirc;ng dụng chữa h&ocirc;i ch&acirc;n, h&ocirc;i n&aacute;ch v&agrave; đặc biệt l&agrave; giảm c&acirc;n cho c&aacute;c chị em rất hữu hiệu.</span></span></span></span></span></span></p>

<p style="text-align:center"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><a class="view-gallery" href="https://biggreen.vn/upload/20366/fck/files/m%C6%B0%E1%BB%9Bp%20%C4%91%E1%BA%AFng.jpg" style="box-sizing:border-box; color:#000000; text-decoration:none"><img alt="" src="https://biggreen.vn/upload/20366/fck/files/m%C6%B0%E1%BB%9Bp%20%C4%91%E1%BA%AFng.jpg" style="border:none; box-sizing:border-box; height:300px; max-width:100%; vertical-align:middle; width:500px" /></a></span></span></span></span></span></span></p>

<p style="text-align:center"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><em><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif">C&oacute; rất nhiều m&oacute;n ăn ngon được l&agrave;m từ mướp đắng</span></span></em></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>3, C&aacute;c loại m&oacute;n ăn c&oacute; thể chế biến từ quả mướp đắng</strong></span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif">- Ăn thường xuy&ecirc;n mướp đắng ch&uacute;ng ta sẽ thấy loại thực phẩm n&agrave;y kh&aacute; ngon v&agrave; lại c&ograve;n bổ dưỡng nữa. Mướp đắng c&oacute; thể kết hợp được với c&aacute;c loại thực phẩm kh&aacute;c tạo n&ecirc;n nhiều m&oacute;n ăn ngon lạ mắt như: Mướp đắng nhồi thịt, mướp đắng x&agrave;o trứng, gỏi mướp đắng, mướp đắng ăn sống với ruốc b&ocirc;ng, mướp đắng x&agrave;o bột tề&hellip; Ngo&agrave;i ra, mướp đắng c&ograve;n được phơi kh&ocirc; d&ugrave;ng l&agrave;m tr&agrave; v&agrave; l&agrave;m mứt.</span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif">- Tuy mướp đắng l&agrave; loại thực phẩm rất tốt cho sức khỏe con người nhưng ch&uacute;ng ta cũng n&ecirc;n biết c&aacute;ch chế biến mướp đắng một c&aacute;ch khoa học v&agrave; kh&ocirc;ng phải ai cũng n&ecirc;n ăn loại quả n&agrave;y thường xuy&ecirc;n: Phụ nữ đang mang thai, mong muốn c&oacute; thai, những người đang bị c&aacute;c bệnh về gan thận, những người đang bị c&aacute;c bệnh về ti&ecirc;u h&oacute;a kh&ocirc;ng n&ecirc;n ăn mướp đắng nhiều.</span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif">Nếu bạn chưa biết cửa h&agrave;ng n&agrave;o c&oacute; bạn loại quả n&agrave;y, hoặc đang lo lắng về xuất xứ nguồn gốc, chất lượng của mướp đắng tại c&aacute;c cửa h&agrave;ng thực phẩm th&igrave; h&atilde;y đến với&nbsp;<strong>Biggreen</strong>. Những tr&aacute;i mướp đắng của ch&uacute;ng t&ocirc;i lu&ocirc;n tươi ngon v&agrave; được nhập từ c&aacute;c n&ocirc;ng trại sạch của Đ&agrave; Lạt n&ecirc;n đảm bảo về nguồn gốc cũng như chất lượng sản phẩm.</span></span></span></span></span></span></p>

<p>&nbsp;</p>',
                'focus'=>1,
                'view'=>10,
                'cate_id'=>2,
                'created_at'=>now(),
                'status'=>1,
            ]);
        }
        for ($i = 0; $i < 10; $i++)
        {
            DB::table('menu')->insert([
                'name'=>'Tại sao chúng ta nên ăn thường xuyên quả mướp đắng?',
                'slug'=>'tai-sao-chung-ta-nen-an-thuong-xuyen-qua-muop-dang',
                'image'=>'BGm6_image_giỏ hoa quả đẹp.jpg',
                'summary'=>'Mướp đắng là loại quả được trồng phổ biến tại Việt Nam. Có lẽ chưa ai trong chúng ta là không từng nếm thử những món ăn được làm từ loại quả này và cũng ít ai có thể hiểu hết được những tác dụng tuyệt vời mà trái mướp đắng mang lại cho sức khỏe con người.',
                'content'=>'<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>1, Mướp đắng l&agrave; loại quả như thế n&agrave;o?</strong></span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif">- Quả mướp đắng c&oacute; t&ecirc;n khoa học l&agrave;: Momordica charantia Linn, thuộc họ nh&agrave; Cucurbitaceae c&ograve;n c&oacute; một t&ecirc;n gọi kh&aacute;c l&agrave; &ldquo;khổ qua&rdquo;. Loại c&acirc;y n&agrave;y được trồng phổ biến tại những khu vực miền n&uacute;i v&agrave; c&aacute;c tỉnh miền Nam Việt Nam.<span style="background-color:#ffffff">&nbsp;Mướp đắng thuộc dạng c&acirc;y leo, mọc ở v&ugrave;ng nhiệt đới v&agrave; cận nhiệt đới, thuộc họ bầu b&iacute;, c&oacute; quả ăn được v&agrave; c&oacute; vị rất đắng so với c&aacute;c loại củ quả kh&aacute;c.</span></span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><span style="background-color:#ffffff">- C&acirc;y mướp đắng c&oacute; th&acirc;n nhỏ đường k&iacute;nh khoảng 3 - 6 mm, l&aacute; kh&aacute; mỏng c&oacute; từ 4-6 cạnh nh&ocirc; ra như mũi gi&aacute;o. Quả mướp đắng sần s&ugrave;i, d&agrave;i khoảng 15-20 cm đường k&iacute;nh khoảng 3-4 cm, c&oacute; vị đắng đặc trưng. Điểm nổi bật của tr&aacute;i mướp đắng (khổ qua) l&agrave; vỏ, thịt quả, ruột v&agrave; hạt đều c&oacute; gi&aacute; trị dinh dưỡng cao ngang nhau, trong đ&oacute; hạt chứa kh&aacute; nhiều chất b&eacute;o. Đặc biệt trong thịt quả mướp đắng chứa nhiều vitamin v&agrave; kho&aacute;ng chất, kali, đặc biệt vitamin C kh&aacute; cao</span>&nbsp;n&ecirc;n c&oacute; nhiều lợi &iacute;ch cho sức khỏe.</span></span></span></span></span></span></p>

<p style="text-align:center"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><a class="view-gallery" href="https://biggreen.vn/upload/20366/fck/files/muop-dang__2_84.jpg" style="box-sizing:border-box; color:#000000; text-decoration:none"><img alt="" src="https://biggreen.vn/upload/20366/fck/files/muop-dang__2_84.jpg" style="border:none; box-sizing:border-box; height:500px; max-width:100%; vertical-align:middle; width:500px" /></a></span></span></span></span></span></span></p>

<p style="text-align:center"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><em><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif">Mướp đắng c&oacute; nhiều t&aacute;c dụng tốt đối với sức khỏe con người</span></span></em></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><strong><span style="background-color:#ffffff">2, Những t&aacute;c dụng tuyệt vời m&agrave; quả mướp đắng mang lại cho sức khỏe con người</span></strong></span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><span style="background-color:#ffffff">Với những dưỡng chất c&oacute; trong c&aacute;c th&agrave;nh phần vỏ, thịt v&agrave; hạt, tr&aacute;i mướp đắng thật sự c&oacute; những &iacute;ch lợi tuyệt vời m&agrave; ch&uacute;ng ta kh&ocirc;ng thể bỏ qua: &nbsp;</span></span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><span style="background-color:#ffffff">-&nbsp;<em>Theo Đ&ocirc;ng y</em>: M</span>ướp đắng c&oacute; vị đắng, lạnh; v&agrave;o tỳ vị t&acirc;m can. T&aacute;c dụng thanh giải nhiệt, minh mục giải độc. D&ugrave;ng cho c&aacute;c trường hợp nhiệt bệnh sốt n&oacute;ng mất nước, hội chứng lỵ, vi&ecirc;m cấp t&iacute;nh đường tiết niệu, sỏi đường tiết niệu, mụn nhọt, đau mắt đỏ, bệnh tiểu đường, ho, vi&ecirc;m họng...v.v</span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><span style="background-color:#ffffff">-&nbsp;<em>Theo y học hiện đại</em>:</span>&nbsp;Mướp đắng c&oacute; t&aacute;c dụng diệt vi khuẩn v&agrave; virus, chống lại c&aacute;c tế b&agrave;o ung thư; hỗ trợ đắc lực cho bệnh nh&acirc;n ung thư đang chữa bằng tia xạ. Trong th&agrave;nh phần dinh dưỡng của mướp đắng c&oacute; nhiều vitamin C với h&agrave;m lượng khoảng 120 mg, cao hơn nhiều so với d&acirc;u t&acirc;y (80 mg) v&agrave; chanh (90 mg); Vitamin C trong mướp đắng gi&uacute;p tăng sức đề kh&aacute;ng cho cơ thể, kh&aacute;ng vi&ecirc;m tốt, ngăn ngừa v&agrave; c&oacute; t&aacute;c dụng ti&ecirc;u diệt tế b&agrave;o ung thư&hellip; Mướp đắng c&ograve;n chứa kali c&oacute; t&aacute;c dụng l&agrave;m giảm huyết &aacute;p, beta-carotene gi&uacute;p s&aacute;ng mắt, ph&ograve;ng ngừa ung thư.</span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif">- Đối với chị em phụ nữ th&igrave; kh&ocirc;ng c&ograve;n lạ lẫm g&igrave; với việc cải thiện l&agrave;n da&nbsp;bằng c&aacute;ch đắp mặt v&agrave; uống nước &eacute;p mướp đắng. Việc n&agrave;y nhằm gi&uacute;p cho da dẻ mịn m&agrave;ng, giảm v&agrave; ti&ecirc;u diệt mụn trứng c&aacute;, mụn đầu đen. Trong loại quả n&agrave;y c&ograve;n c&oacute; nhiều nước v&agrave; vitamin n&ecirc;n da sẽ t&aacute;i tạo rất nhanh. Ngo&agrave;i ra, quả mướp đắng c&ograve;n c&oacute; c&ocirc;ng dụng chữa h&ocirc;i ch&acirc;n, h&ocirc;i n&aacute;ch v&agrave; đặc biệt l&agrave; giảm c&acirc;n cho c&aacute;c chị em rất hữu hiệu.</span></span></span></span></span></span></p>

<p style="text-align:center"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><a class="view-gallery" href="https://biggreen.vn/upload/20366/fck/files/m%C6%B0%E1%BB%9Bp%20%C4%91%E1%BA%AFng.jpg" style="box-sizing:border-box; color:#000000; text-decoration:none"><img alt="" src="https://biggreen.vn/upload/20366/fck/files/m%C6%B0%E1%BB%9Bp%20%C4%91%E1%BA%AFng.jpg" style="border:none; box-sizing:border-box; height:300px; max-width:100%; vertical-align:middle; width:500px" /></a></span></span></span></span></span></span></p>

<p style="text-align:center"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><em><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif">C&oacute; rất nhiều m&oacute;n ăn ngon được l&agrave;m từ mướp đắng</span></span></em></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>3, C&aacute;c loại m&oacute;n ăn c&oacute; thể chế biến từ quả mướp đắng</strong></span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif">- Ăn thường xuy&ecirc;n mướp đắng ch&uacute;ng ta sẽ thấy loại thực phẩm n&agrave;y kh&aacute; ngon v&agrave; lại c&ograve;n bổ dưỡng nữa. Mướp đắng c&oacute; thể kết hợp được với c&aacute;c loại thực phẩm kh&aacute;c tạo n&ecirc;n nhiều m&oacute;n ăn ngon lạ mắt như: Mướp đắng nhồi thịt, mướp đắng x&agrave;o trứng, gỏi mướp đắng, mướp đắng ăn sống với ruốc b&ocirc;ng, mướp đắng x&agrave;o bột tề&hellip; Ngo&agrave;i ra, mướp đắng c&ograve;n được phơi kh&ocirc; d&ugrave;ng l&agrave;m tr&agrave; v&agrave; l&agrave;m mứt.</span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif">- Tuy mướp đắng l&agrave; loại thực phẩm rất tốt cho sức khỏe con người nhưng ch&uacute;ng ta cũng n&ecirc;n biết c&aacute;ch chế biến mướp đắng một c&aacute;ch khoa học v&agrave; kh&ocirc;ng phải ai cũng n&ecirc;n ăn loại quả n&agrave;y thường xuy&ecirc;n: Phụ nữ đang mang thai, mong muốn c&oacute; thai, những người đang bị c&aacute;c bệnh về gan thận, những người đang bị c&aacute;c bệnh về ti&ecirc;u h&oacute;a kh&ocirc;ng n&ecirc;n ăn mướp đắng nhiều.</span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif">Nếu bạn chưa biết cửa h&agrave;ng n&agrave;o c&oacute; bạn loại quả n&agrave;y, hoặc đang lo lắng về xuất xứ nguồn gốc, chất lượng của mướp đắng tại c&aacute;c cửa h&agrave;ng thực phẩm th&igrave; h&atilde;y đến với&nbsp;<strong>Biggreen</strong>. Những tr&aacute;i mướp đắng của ch&uacute;ng t&ocirc;i lu&ocirc;n tươi ngon v&agrave; được nhập từ c&aacute;c n&ocirc;ng trại sạch của Đ&agrave; Lạt n&ecirc;n đảm bảo về nguồn gốc cũng như chất lượng sản phẩm.</span></span></span></span></span></span></p>

<p>&nbsp;</p>',
                'focus'=>1,
                'view'=>10,
                'cate_id'=>3,
                'created_at'=>now(),
                'status'=>1,
            ]);
        }
//        Partner
        DB::table('partner')->insert([
            'name'=>'Công ty TNHH dịch vụ và giáo dục Sen Vàng',
            'logo'=>'nN2r_image_giỏ hoa quả đẹp.jpg',
            'link'=>'http://www.babymon.edu.vn/',
            'address'=>'43 Nguyễn Tuân - 203 Nguyễn Huy Tưởng, Thanh Xuân, Hà Nội',
            'phone'=>'0969902940',
            'summary'=>'Để trẻ tự do phát triển với từng tính cách, nguyên tắc được xây dựng trên cơ sở giúp bé phát triển tự nhiên nhất, trẻ vui vẻ, hạnh phúc là mục tiêu giáo dục hàng đầu của nhà trường.',
            'content'=>'<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>1, Mướp đắng l&agrave; loại quả như thế n&agrave;o?</strong></span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif">- Quả mướp đắng c&oacute; t&ecirc;n khoa học l&agrave;: Momordica charantia Linn, thuộc họ nh&agrave; Cucurbitaceae c&ograve;n c&oacute; một t&ecirc;n gọi kh&aacute;c l&agrave; &ldquo;khổ qua&rdquo;. Loại c&acirc;y n&agrave;y được trồng phổ biến tại những khu vực miền n&uacute;i v&agrave; c&aacute;c tỉnh miền Nam Việt Nam.<span style="background-color:#ffffff">&nbsp;Mướp đắng thuộc dạng c&acirc;y leo, mọc ở v&ugrave;ng nhiệt đới v&agrave; cận nhiệt đới, thuộc họ bầu b&iacute;, c&oacute; quả ăn được v&agrave; c&oacute; vị rất đắng so với c&aacute;c loại củ quả kh&aacute;c.</span></span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><span style="background-color:#ffffff">- C&acirc;y mướp đắng c&oacute; th&acirc;n nhỏ đường k&iacute;nh khoảng 3 - 6 mm, l&aacute; kh&aacute; mỏng c&oacute; từ 4-6 cạnh nh&ocirc; ra như mũi gi&aacute;o. Quả mướp đắng sần s&ugrave;i, d&agrave;i khoảng 15-20 cm đường k&iacute;nh khoảng 3-4 cm, c&oacute; vị đắng đặc trưng. Điểm nổi bật của tr&aacute;i mướp đắng (khổ qua) l&agrave; vỏ, thịt quả, ruột v&agrave; hạt đều c&oacute; gi&aacute; trị dinh dưỡng cao ngang nhau, trong đ&oacute; hạt chứa kh&aacute; nhiều chất b&eacute;o. Đặc biệt trong thịt quả mướp đắng chứa nhiều vitamin v&agrave; kho&aacute;ng chất, kali, đặc biệt vitamin C kh&aacute; cao</span>&nbsp;n&ecirc;n c&oacute; nhiều lợi &iacute;ch cho sức khỏe.</span></span></span></span></span></span></p>

<p style="text-align:center"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><a class="view-gallery" href="https://biggreen.vn/upload/20366/fck/files/muop-dang__2_84.jpg" style="box-sizing:border-box; color:#000000; text-decoration:none"><img alt="" src="https://biggreen.vn/upload/20366/fck/files/muop-dang__2_84.jpg" style="border:none; box-sizing:border-box; height:500px; max-width:100%; vertical-align:middle; width:500px" /></a></span></span></span></span></span></span></p>

<p style="text-align:center"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><em><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif">Mướp đắng c&oacute; nhiều t&aacute;c dụng tốt đối với sức khỏe con người</span></span></em></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><strong><span style="background-color:#ffffff">2, Những t&aacute;c dụng tuyệt vời m&agrave; quả mướp đắng mang lại cho sức khỏe con người</span></strong></span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><span style="background-color:#ffffff">Với những dưỡng chất c&oacute; trong c&aacute;c th&agrave;nh phần vỏ, thịt v&agrave; hạt, tr&aacute;i mướp đắng thật sự c&oacute; những &iacute;ch lợi tuyệt vời m&agrave; ch&uacute;ng ta kh&ocirc;ng thể bỏ qua: &nbsp;</span></span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><span style="background-color:#ffffff">-&nbsp;<em>Theo Đ&ocirc;ng y</em>: M</span>ướp đắng c&oacute; vị đắng, lạnh; v&agrave;o tỳ vị t&acirc;m can. T&aacute;c dụng thanh giải nhiệt, minh mục giải độc. D&ugrave;ng cho c&aacute;c trường hợp nhiệt bệnh sốt n&oacute;ng mất nước, hội chứng lỵ, vi&ecirc;m cấp t&iacute;nh đường tiết niệu, sỏi đường tiết niệu, mụn nhọt, đau mắt đỏ, bệnh tiểu đường, ho, vi&ecirc;m họng...v.v</span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><span style="background-color:#ffffff">-&nbsp;<em>Theo y học hiện đại</em>:</span>&nbsp;Mướp đắng c&oacute; t&aacute;c dụng diệt vi khuẩn v&agrave; virus, chống lại c&aacute;c tế b&agrave;o ung thư; hỗ trợ đắc lực cho bệnh nh&acirc;n ung thư đang chữa bằng tia xạ. Trong th&agrave;nh phần dinh dưỡng của mướp đắng c&oacute; nhiều vitamin C với h&agrave;m lượng khoảng 120 mg, cao hơn nhiều so với d&acirc;u t&acirc;y (80 mg) v&agrave; chanh (90 mg); Vitamin C trong mướp đắng gi&uacute;p tăng sức đề kh&aacute;ng cho cơ thể, kh&aacute;ng vi&ecirc;m tốt, ngăn ngừa v&agrave; c&oacute; t&aacute;c dụng ti&ecirc;u diệt tế b&agrave;o ung thư&hellip; Mướp đắng c&ograve;n chứa kali c&oacute; t&aacute;c dụng l&agrave;m giảm huyết &aacute;p, beta-carotene gi&uacute;p s&aacute;ng mắt, ph&ograve;ng ngừa ung thư.</span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif">- Đối với chị em phụ nữ th&igrave; kh&ocirc;ng c&ograve;n lạ lẫm g&igrave; với việc cải thiện l&agrave;n da&nbsp;bằng c&aacute;ch đắp mặt v&agrave; uống nước &eacute;p mướp đắng. Việc n&agrave;y nhằm gi&uacute;p cho da dẻ mịn m&agrave;ng, giảm v&agrave; ti&ecirc;u diệt mụn trứng c&aacute;, mụn đầu đen. Trong loại quả n&agrave;y c&ograve;n c&oacute; nhiều nước v&agrave; vitamin n&ecirc;n da sẽ t&aacute;i tạo rất nhanh. Ngo&agrave;i ra, quả mướp đắng c&ograve;n c&oacute; c&ocirc;ng dụng chữa h&ocirc;i ch&acirc;n, h&ocirc;i n&aacute;ch v&agrave; đặc biệt l&agrave; giảm c&acirc;n cho c&aacute;c chị em rất hữu hiệu.</span></span></span></span></span></span></p>

<p style="text-align:center"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><a class="view-gallery" href="https://biggreen.vn/upload/20366/fck/files/m%C6%B0%E1%BB%9Bp%20%C4%91%E1%BA%AFng.jpg" style="box-sizing:border-box; color:#000000; text-decoration:none"><img alt="" src="https://biggreen.vn/upload/20366/fck/files/m%C6%B0%E1%BB%9Bp%20%C4%91%E1%BA%AFng.jpg" style="border:none; box-sizing:border-box; height:300px; max-width:100%; vertical-align:middle; width:500px" /></a></span></span></span></span></span></span></p>

<p style="text-align:center"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><em><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif">C&oacute; rất nhiều m&oacute;n ăn ngon được l&agrave;m từ mướp đắng</span></span></em></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>3, C&aacute;c loại m&oacute;n ăn c&oacute; thể chế biến từ quả mướp đắng</strong></span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif">- Ăn thường xuy&ecirc;n mướp đắng ch&uacute;ng ta sẽ thấy loại thực phẩm n&agrave;y kh&aacute; ngon v&agrave; lại c&ograve;n bổ dưỡng nữa. Mướp đắng c&oacute; thể kết hợp được với c&aacute;c loại thực phẩm kh&aacute;c tạo n&ecirc;n nhiều m&oacute;n ăn ngon lạ mắt như: Mướp đắng nhồi thịt, mướp đắng x&agrave;o trứng, gỏi mướp đắng, mướp đắng ăn sống với ruốc b&ocirc;ng, mướp đắng x&agrave;o bột tề&hellip; Ngo&agrave;i ra, mướp đắng c&ograve;n được phơi kh&ocirc; d&ugrave;ng l&agrave;m tr&agrave; v&agrave; l&agrave;m mứt.</span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif">- Tuy mướp đắng l&agrave; loại thực phẩm rất tốt cho sức khỏe con người nhưng ch&uacute;ng ta cũng n&ecirc;n biết c&aacute;ch chế biến mướp đắng một c&aacute;ch khoa học v&agrave; kh&ocirc;ng phải ai cũng n&ecirc;n ăn loại quả n&agrave;y thường xuy&ecirc;n: Phụ nữ đang mang thai, mong muốn c&oacute; thai, những người đang bị c&aacute;c bệnh về gan thận, những người đang bị c&aacute;c bệnh về ti&ecirc;u h&oacute;a kh&ocirc;ng n&ecirc;n ăn mướp đắng nhiều.</span></span></span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:14px"><span style="color:#333333"><span style="font-family:Helvetica,Arial,sans-serif"><span style="background-color:#ffffff"><span style="font-size:14px"><span style="font-family:Arial,Helvetica,sans-serif">Nếu bạn chưa biết cửa h&agrave;ng n&agrave;o c&oacute; bạn loại quả n&agrave;y, hoặc đang lo lắng về xuất xứ nguồn gốc, chất lượng của mướp đắng tại c&aacute;c cửa h&agrave;ng thực phẩm th&igrave; h&atilde;y đến với&nbsp;<strong>Biggreen</strong>. Những tr&aacute;i mướp đắng của ch&uacute;ng t&ocirc;i lu&ocirc;n tươi ngon v&agrave; được nhập từ c&aacute;c n&ocirc;ng trại sạch của Đ&agrave; Lạt n&ecirc;n đảm bảo về nguồn gốc cũng như chất lượng sản phẩm.</span></span></span></span></span></span></p>

<p>&nbsp;</p>',
            'fax'=>'043368579',
            'status'=>1,
            'created_at'=>now(),
        ]);
        DB::table('cate_products_lv1')->insert([
            [
                'name' => 'Rau - Củ',
                'color' => '#02894c',
                'image' => 'default.png',
                'slug' => str_slug('Rau - Củ').'-'.time().'.html'
            ],[
                'name' => 'thực phẩm tươi sống',
                'color' => '#f86211',
                'image' => '1566461646_cate_icon_thuc-pham-tuoi-song.png',
                'slug' => str_slug('thực phẩm tươi sống').'-'.time().'.html'
            ],[
                'name' => 'hoa quả',
                'color' => '#569e16',
                'image' => 'qua.png',
                'slug' => str_slug('hoa quả').'-'.time().'.html'
            ],
        ]);
        DB::table('cate_products_lv2')->insert([
            [
                'name' => 'rau an toàn',
                'slug' => str_slug('rau an toàn').'-'.time().'.html',
                'cate_lv1_id' => 1,
            ],[
                'name' => 'rau hữu cơ',
                'slug' => str_slug('rau hữu cơ').'-'.time().'.html',
                'cate_lv1_id' => 1,
            ],[
                'name' => 'hải sản tươi sống',
                'slug' => str_slug('hải sản tươi sống').'-'.time().'.html',
                'cate_lv1_id' => 2,
            ],[
                'name' => 'thịt tươi sống',
                'slug' => str_slug('thịt tươi sống').'-'.time().'.html',
                'cate_lv1_id' => 2,
            ],[
                'name' => 'trái cây nhập khẩu',
                'slug' => str_slug('trái cây nhập khẩu').'-'.time().'.html',
                'cate_lv1_id' => 3,
            ],[
                'name' => 'trái cây trong nước',
                'slug' => str_slug('trái cây trong nước').'-'.time().'.html',
                'cate_lv1_id' => 3,
            ],
        ]);

        DB::table('units')->insert([
            'name' => 'KG',
        ]);

        DB::table('slider')->insert([
            [
                'image' => '1567821508_slider_pannel1.jpg'
            ],
            [
                'image' => '1567821518_slider_pannel2.jpg'
            ]
        ])
    }

}
