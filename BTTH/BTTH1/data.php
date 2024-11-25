<?php
// // Xóa toàn bộ session
// session_unset();
// session_destroy();

// // Xóa cookie lưu trữ session (nếu có)
// if (ini_get("session.use_cookies")) {
//     $params = session_get_cookie_params();
//     setcookie(
//         session_name(),
//         '',
//         time() - 42000,
//         $params["path"],
//         $params["domain"],
//         $params["secure"],
//         $params["httponly"]
//     );
// }

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['flowers'])) {
    $_SESSION['flowers'] = [
        [
            'id' => 1,
            'name' => 'Hoa Dạ Yến Thảo',
            'description' => 'Dạ yến thảo là lựa chọn thích hợp cho những ai yêu thích trồng hoa làm đẹp nhà ở. Hoa có thể nở rực quanh năm, kể cả tiết trời se lạnh của mùa xuân hay cả những ngày nắng nóng cao điểm của mùa hè. Dạ yến thảo được trồng ở chậu treo nơi cửa sổ hay ban công, dáng hoa mềm mại, sắc màu đa dạng nên được yêu thích vô cùng.',
            'image' => 'images/hoa_da_yen_thao.jpg'
        ],
        [
            'id' => 2,
            'name' => 'Hoa Đồng Tiền',
            'description' => 'Hoa đồng tiền thích hợp để trồng trong mùa xuân và đầu mùa hè, khi mà cường độ ánh sáng chưa quá mạnh. Cây có hoa to, nở rộ rực rỡ, lại khá dễ trồng và chăm sóc nên sẽ là lựa chọn thích hợp của bạn trong tiết trời này. Về mặt ý nghĩa, hoa đồng tiền cũng tượng trưng cho sự sung túc, tình yêu và hạnh phúc viên mãn.',
            'image' => 'images/hoa_dong_tien.jpg'
        ],
        [
            'id' => 3,
            'name' => 'Hoa Giấy',
            'description' => 'Hoa giấy có mặt ở hầu khắp mọi nơi trên đất nước ta, thích hợp với nhiều điều kiện sống khác nhau nên rất dễ trồng, không tốn quá nhiều công chăm sóc nhưng thành quả mang lại sẽ khiến bạn vô cùng hài lòng. Hoa giấy mỏng manh nhưng rất lâu tàn, với nhiều màu như trắng, xanh, đỏ, hồng, tím, vàng… cùng nhiều sắc độ khác nhau. Vào mùa khô hanh, hoa vẫn tươi sáng trên cây khiến ngôi nhà luôn luôn bừng sáng.',
            'image' => 'images/hoa_giay.jpg'
        ],
        [
            'id' => 4,
            'name' => 'Hoa Thanh Tú',
            'description' => 'Mang dáng hình tao nhã, màu sắc thiên thanh dịu dàng của hoa thanh tú có thể khiến bạn cảm thấy vô cùng nhẹ nhàng khi nhìn ngắm. Cây khá dễ trồng, lại nở nhiều hoa cùng một lúc, từ một bụi nhỏ có thể đâm nhánh, tạo nên những cây con phát triển sum suê. Thanh tú trồng ở nơi có nắng sẽ ra hoa nhiều, vì thế thích hợp trong cả mùa xuân lẫn mùa hè, đem lại khoảng không gian xanh mát cho ngôi nhà ngày oi nóng.',
            'image' => 'images/hoa_thanh_tu.jpg'
        ],
        [
            'id' => 5,
            'name' => 'Hoa Đèn Lồng',
            'description' => 'Giống như tên gọi, hoa đèn lồng có vẻ đẹp giống như chiếc đèn lồng đỏ trên cao. Nếu giàu trí tưởng tượng hơn, chúng ta sẽ hình dung hoa khi nụ đổ xuống thành từng chùm, kết năm kết ba như những thiếu nữ xúng xính trong chiếc đầm dạ hội. Hoa đèn lồng còn có tên là hồng đăng hoa, trồng trong chậu treo, bồn, phên dậu,… gieo hạt vào mùa xuân và cho hoa quanh năm.',
            'image' => 'images/hoa_den_long.jpg'
        ],
        [
            'id' => 6,
            'name' => 'Hoa Cẩm Chướng',
            'description' => 'Cẩm chướng là loại hoa thích hợp trồng vào dịp xuân - hè, nếu tiết trời không quá lạnh có thể kéo dài đến tận mùa đông. Hoa có phần thân mảnh, các đốt ngắn mang lá kép cùng nhiều màu sắc như hồng, vàng, đỏ, tím,… thậm chí có thể pha lẫn màu để tạo nên đường viền xinh xắn. Đặt một chậu hoa cẩm chướng trên bàn sẽ khiến căn phòng của bạn đẹp mắt hơn rất nhiều.',
            'image' => 'images/hoa_cam_chuong.jpg'
        ],
        [
            'id' => 7,
            'name' => 'Hoa Huỳnh Anh',
            'description' => 'Nếu bạn đang đi tìm một loài hoa tô điểm cho khu vực ban công hoặc hàng rào ngôi nhà thì huỳnh anh là một lựa chọn thích hợp trong mùa này hơn cả. Hoa có màu vàng rực, hình dạng như chiếc kèn be bé inh xinh, lại dễ trồng, mọc nhanh, vươn cao… Huỳnh Anh rất thích nắng, ánh nắng giúp hoa tỏa sáng rực rỡ, nếu ở nơi bóng râm thì chúng sẽ nhạt màu, kém sắc.',
            'image' => 'images/hoa_huynh_anh.jpg'
        ],
        [
            'id' => 8,
            'name' => 'Hoa Păng-xê',
            'description' => 'Vào mỗi độ tháng 4 về là dịp mà loài hoa Phăng-xê nở rộ vô cùng đẹp mắt. Hoa còn được gọi tên là hay hoa bướm, hoa tử la lan, hoa tương tư,… Păng-xê thường được trồng trong chậu nhỏ, với phần cánh mỏng mượt như nhung, hình dạng cánh bướm mềm mại như đang tung tăng nhảy múa mỗi khi có làn gió thổi qua. Đây cũng là loài hoa tinh tế và sức sống bền bỉ. ',
            'image' => 'images/hoa_pang_xe.jpg'
        ],
        [
            'id' => 9,
            'name' => 'Hoa Sen',
            'description' => 'Khi những tia nắng ấm áp của mùa hè bắt đầu xuất hiện thì cũng là lúc mùa sen lại về trên những cánh đồng bạt ngàn. Hoa sen tượng trưng cho vẻ đẹp trắng trong, tao nhã của tâm hồn. Hoa có thể được trồng trong chiếc ao vườn nhà, có thể được trồng trong chậu trang trí đều đẹp cả. Những bông hoa đẹp nở rộ như báo hiệu một mùa hè tuyệt đẹp hiện hữu trong ngôi nhà của bạn.',
            'image' => 'images/hoa_sen.jpg'
        ],
        [
            'id' => 10,
            'name' => 'Hoa Dừa Cạn',
            'description' => 'Hoa dừa cạn còn có các tên gọi như trường xuân hoa, dương giác, bông dừa, mỹ miều hơn thì là Hải Đằng. Hoa nở không ngừng từ mùa xuân sang mùa hè cho đến tận mùa thu. Hoa có 3 màu cơ bản là trắng, hồng nhạt và tím nhạt, lá và hoa cùng nhau vươn lên khiến cho khóm dừa cạn tuy nhỏ bé nhưng luôn tràn đầy sức sống. Loài hoa này còn tượng trưng cho sự thành đạt và có khả năng trừ tà.',
            'image' => 'images/hoa_dua_can.jpg'
        ],
        
    ];
}

function getAllFlowers()
{
    return $_SESSION['flowers'];
}

function getFlower($id)
{
    foreach ($_SESSION['flowers'] as $flower) {
        if ($flower['id'] == $id) {
            return $flower;
        }
    }
    return null;
}

function addFlower($name, $description, $image)
{
    $id = time();
    $_SESSION['flowers'][] = [
        'id' => $id,
        'name' => $name,
        'description' => $description,
        'image' => $image
    ];
}

function updateFlower($id, $name, $description, $image)
{
    foreach ($_SESSION['flowers'] as $key => $flower) {
        if ($flower['id'] == $id) {
            $_SESSION['flowers'][$key] = [
                'id' => $id,
                'name' => $name,
                'description' => $description,
                'image' => $image ?: $flower['image']
            ];
            break;
        }
    }
}

function deleteFlower($id)
{
    foreach ($_SESSION['flowers'] as $key => $flower) {
        if ($flower['id'] == $id) {
            unset($_SESSION['flowers'][$key]);
            break;
        }
    }
    $_SESSION['flowers'] = array_values($_SESSION['flowers']);
}
