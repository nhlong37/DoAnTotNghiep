-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2024 at 03:41 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doantn`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, 'db_datn', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table_album`
--

CREATE TABLE `table_album` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_product` bigint(20) UNSIGNED DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_album`
--

INSERT INTO `table_album` (`id`, `id_product`, `photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(16, 3, 'pictureProduct-Ce3Ym.jpeg', '2024-01-10 09:23:15', '2024-01-10 09:23:15', NULL),
(17, 3, 'pictureProduct-P5C1u.jpeg', '2024-01-10 09:23:15', '2024-01-10 09:23:15', NULL),
(18, 3, 'pictureProduct-dwk2E.jpeg', '2024-01-10 09:23:15', '2024-01-10 09:23:15', NULL),
(19, 3, 'pictureProduct-ti4wX.jpeg', '2024-01-10 09:23:15', '2024-01-10 09:23:15', NULL),
(20, 3, 'pictureProduct-9VY7J.jpeg', '2024-01-10 09:23:15', '2024-01-10 09:23:15', NULL),
(25, 4, 'pictureProduct-UASjo.jpg', '2024-01-10 09:34:01', '2024-01-10 09:34:01', NULL),
(26, 4, 'pictureProduct-ixhVQ.jpg', '2024-01-10 09:34:01', '2024-01-10 09:34:01', NULL),
(27, 4, 'pictureProduct-BC5cj.jpg', '2024-01-10 09:34:01', '2024-01-10 09:34:01', NULL),
(28, 4, 'pictureProduct-2KGbA.jpg', '2024-01-10 09:34:01', '2024-01-10 09:34:01', NULL),
(29, 4, 'pictureProduct-54deo.jpg', '2024-01-10 09:34:01', '2024-01-10 09:34:01', NULL),
(30, 5, 'pictureProduct-jpCPK.jpeg', '2024-01-10 09:34:28', '2024-01-10 09:34:28', NULL),
(31, 5, 'pictureProduct-NxU6J.jpeg', '2024-01-10 09:34:28', '2024-01-10 09:34:28', NULL),
(32, 5, 'pictureProduct-fkwTm.jpeg', '2024-01-10 09:34:28', '2024-01-10 09:34:28', NULL),
(33, 5, 'pictureProduct-8W7Jh.jpeg', '2024-01-10 09:34:28', '2024-01-10 09:34:28', NULL),
(34, 7, 'pictureProduct-UbzPM.jpg', '2024-01-10 09:35:17', '2024-01-10 09:35:17', NULL),
(35, 7, 'pictureProduct-OBHRn.jpg', '2024-01-10 09:35:17', '2024-01-10 09:35:17', NULL),
(36, 7, 'pictureProduct-UHkXJ.jpg', '2024-01-10 09:35:17', '2024-01-10 09:35:17', NULL),
(37, 7, 'pictureProduct-3ydqH.jpg', '2024-01-10 09:35:17', '2024-01-10 09:35:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `table_article`
--

CREATE TABLE `table_article` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` mediumtext DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT 0,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_article`
--

INSERT INTO `table_article` (`id`, `name`, `content`, `photo`, `view`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Mẹo khử mùi hôi giày mà không phải giặt', '&lt;p&gt;Giày hôi ảnh hưởng đến sự tự tin của bạn và khiến người xung quanh cảm thấy khó chịu. Việc mang giày hôi cũng sẽ sinh nấm mốc ở chân gây tổn hại đến sức khỏe.&lt;/p&gt;&lt;p&gt;Dưới đây là những mẹo khử mùi hôi giày hiệu quả mà không phải giặt thường xuyên.&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Dùng baking soda&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;Dùng hai thìa cà phê banking soda đặt vào khăn giấy mỏng, sau đó gấp lại và cố định bằng chun vòng. Sau khi cởi giày, cho túi khử mùi banking vào sâu bên trong giày. Mồ hôi trong giày có tính axit, còn banking soda mang tính kiềm, có tác dụng tốt trong việc trung hòa axit. Hơn nữa khăn giấy và banking soda đều khô, có khả năng hút nước tốt nên hút được ẩm bên trong giày.&lt;/p&gt;&lt;p&gt;Nên để túi khử mùi này qua đêm, giày sẽ khô và không còn mùi khó chịu vào ngày hôm sau. Nếu muốn giày thơm hơn, có thể thêm vài giọt tinh dầu vào hỗn hợp trên.&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Xịt cồn vào lót giày&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;Sau khi về nhà, lấy miếng lót trong giày ra rồi xịt cồn trực tiếp vào trong.&lt;/p&gt;&lt;p&gt;Cồn có tác dụng diệt khuẩn, khử trùng và có thể loại bỏ một số vi khuẩn gây mùi khó chịu. Hơn nữa cồn bay hơi rất nhanh, giày xịt xong nên phơi khô ngoài không khí ở nơi thoáng mát. Cũng nên xịt cồn lên mặt trước và mặt sau giày để diệt khuẩn và làm sạch mùi hôi bám trên đó. Với cách làm này có thể khử mùi hôi trong giày mà không phải giặt thường xuyên.&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Sử dụng túi trà khô&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;Túi trà có khả năng thấm hút cao nên khi để trong giày, chúng sẽ hút hơi ẩm ra khỏi vải. Trà càng thơm thì độ khử mùi càng hiệu quả.&lt;/p&gt;&lt;p&gt;Cho một nhúm trà vào khăn giấy rồi gói lại bằng chun vòng, bỏ trong giày để qua đêm. Qua 24 tiếng, giày sẽ thoang thoảng mùi trà và mùi hôi ẩm ướt sẽ bay đi hoàn toàn. Cũng có thể dùng bã trà đã uống, phơi nắng cho khô rồi tái sử dụng.&lt;/p&gt;&lt;p&gt;Ngoài cách trên, có thể sử dụng giấy báo cũ để khử mùi giày. Vo tròn giấy báo rồi nhét sâu vào giày. Cách này không những hút ẩm tốt, định hình giày mà còn khiến vi khuẩn không còn cơ hội sinh sôi. Tương tự như baking soda hay túi trà, đặt giấy báo vào trong giày một ngày và lấy ra kiểm tra vào hôm sau.&lt;/p&gt;&lt;p&gt;Ngoài những phương pháp trên, nên áp dụng thêm một số cách khử mùi giày dưới đây để không phải giặt thường xuyên.&lt;/p&gt;&lt;p&gt;- Thay miếng lót giày ba tháng một lần.&lt;/p&gt;&lt;p&gt;- Nếu chân ra nhiều mồ hôi, rắc một ít phấn rôm vào trong giày hoặc thoa lên bàn chân trước khi đi giày.&lt;/p&gt;&lt;p&gt;- Khi giày bị ẩm ướt, phải sấy và phơi nơi khô ráo, tránh mang giày ướt&lt;/p&gt;&lt;p&gt;- Thay tất thường xuyên cũng là cách ngăn chặn mùi hôi hiệu quả.&lt;/p&gt;', 'article-goLGW.jpg', 45, 'tin-tuc', '2024-01-06 03:45:32', '2024-01-10 09:05:18', NULL),
(2, 'Trung Quốc phát triển giày phân hủy sinh học', '&lt;p&gt;Đại học Công nghệ Hóa học Bắc Kinh ra mắt lô giày sinh học đầu tiên có thể sử dụng hàng ngày và phân hủy trong điều kiện ủ phân.&lt;/p&gt;&lt;p&gt;Tổng cộng hơn 500 đôi giày đã được Đại học Công nghệ Hóa học Bắc Kinh (BUCT) trao tặng cho các giảng viên và sinh viên tại buổi lễ phát hành lô giày phân hủy hoàn toàn dựa trên sinh học đầu tiên vào hôm 16/8.&lt;/p&gt;&lt;p&gt;Theo &lt;i&gt;Science Net&lt;/i&gt;, phần đế giày sử dụng chất liệu cao su polyester có nguồn gốc sinh học do BUCT phát triển độc lập, trong khi các bộ phận khác được làm từ sợi gai dầu, sợi tre và vật liệu mủ thân cây ngô. Chúng đủ ổn định để sử dụng hàng ngày và phân hủy nhanh chóng trong điều kiện ủ phân.&lt;/p&gt;&lt;p&gt;Nhóm nghiên cứu do Viện sĩ Zhang Liqun tại Học viện Kỹ thuật Trung Quốc và Giáo sư Wang Zhao tại BUCT dẫn đầu đã hoàn thành sản xuất thử nghiệm quy mô 1.000 tấn cao su polyester. Loại cao su này cũng có thể dùng để sản xuất lốp xe, vòng đệm chống dầu, axit polylactic và chất lưu hóa dẻo nhiệt.&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;https://i1-vnexpress.vnecdn.net/2022/08/19/giay-phan-huy-8378-1660877687.jpg?w=680&amp;amp;h=0&amp;amp;q=100&amp;amp;dpr=1&amp;amp;fit=crop&amp;amp;s=8NuIiplu4eLuz5qgIHjAaw&quot; alt=&quot;Buổi lễ phát hành và trao tặng giày sinh học tại Đại học Công nghệ Hóa học Bắc Kinh. Ảnh: BUCT&quot;&gt;&lt;/p&gt;&lt;p&gt;Theo Wang, việc thiếu vật liệu cao su phân hủy sinh học là nguyên nhân chính hạn chế sự phát triển của giày phân hủy ở Trung Quốc. Mỗi năm, có gần một tỷ đôi giày bị vứt bỏ và nếu không được xử lý hiệu quả, đó sẽ là một mối đe dọa đối với môi trường.&lt;/p&gt;&lt;p&gt;Sau khi phát hành lô giày quy mô nhỏ đầu tiên, nhóm nghiên cứu tại BUCT sẽ làm việc với các doanh nghiệp để thực hiện sản xuất hàng loạt.&lt;/p&gt;', 'article-ipq7l.jpg', 23, 'tin-tuc', '2024-01-06 03:47:12', '2024-01-10 04:34:30', NULL),
(5, 'Giới thiệu về Shop', '&lt;p&gt;&lt;span style=&quot;background-color:rgb(255,255,255);color:rgb(77,77,77);&quot;&gt;HL Shoes Store được đông đảo người tiêu dùng Việt, đặc biệt là tại TPHCM biết tới là một đơn vị uy tín, đã có trên 3 năm kinh nghiệm trong lĩnh vực ohana phối sỉ và lẻ hàng chính hãng, đặc biệt là hàng thể thao. Hiện đơn vị đang tọa lạc tại địa chỉ Đường Số 1, Trường Thọ, TP Thủ Đức.&lt;/span&gt;&lt;/p&gt;', NULL, 0, 'gioi-thieu', '2024-01-09 11:16:28', '2024-01-09 11:16:28', NULL),
(8, 'Chính sách bảo mật', '&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&lt;span style=&quot;background-color:rgb(255,255,255);color:rgb(0,0,0);&quot;&gt; is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/span&gt;&lt;/p&gt;', NULL, 1, 'chinh-sach', '2024-01-09 11:50:39', '2024-01-10 12:57:22', NULL),
(9, 'Chính sách mua bán', '&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&lt;span style=&quot;background-color:rgb(255,255,255);color:rgb(0,0,0);&quot;&gt; is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/span&gt;&lt;/p&gt;', NULL, 0, 'chinh-sach', '2024-01-09 11:50:48', '2024-01-10 12:57:17', NULL),
(10, 'Chính sách đổi trả', '&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&lt;span style=&quot;background-color:rgb(255,255,255);color:rgb(0,0,0);&quot;&gt; is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/span&gt;&lt;/p&gt;', NULL, 0, 'chinh-sach', '2024-01-09 11:50:58', '2024-01-10 12:57:10', NULL),
(11, 'Nike - hãng giày ra đời từ bài luận trong trường đại học', '&lt;p&gt;Phil Knight nảy ra ý tưởng về Nike nhờ tham gia đội tuyển điền kinh của trường và trải nghiệm trong các lớp học về kinh doanh.&lt;/p&gt;&lt;p&gt;Hành trình của Nike bắt đầu vào năm 1962. Khi đó, đồng sáng lập Phil Knight vừa hoàn thành chương trình MBA (thạc sĩ quản trị kinh doanh) tại Đại học Stanford. Trước đó, ông đã tốt nghiệp cử nhân tại Đại học Oregon. Theo &lt;i&gt;The Street&lt;/i&gt;, đây được coi là hai trải nghiệm quan trọng định hình cho sự nghiệp của Knight sau này.&lt;/p&gt;&lt;p&gt;Ở trường Oregon, ông tham gia vào đội tuyển điền kinh của huấn luyện viên Bill Bowerman – đồng sáng lập Nike sau này. Bowerman luôn quan tâm đến việc tối ưu hóa giày cho học trò. Ông thường xuyên sửa giày cho họ sau khi học hỏi từ một thợ giày địa phương. Chính điều này đã khiến Knight ấn tượng.&lt;/p&gt;&lt;p&gt;Trong cuốn tự truyện &quot;Shoe Dog&quot; sau này, Phil Knight tiết lộ ông nảy ra ý tưởng về Nike nhờ &quot;các đường chạy tại Oregon và các lớp học ở Stanford&quot;. Tại Stanford, Knight còn từng viết một bài luận về lý do giày chạy nên dời địa điểm sản xuất truyền thống từ Đức sang Nhật Bản – nơi có giá nhân công rẻ hơn. Ý tưởng này được coi là điên rồ ở thời điểm đó.&lt;/p&gt;&lt;p&gt;Nhưng sau khi tốt nghiệp, Knight đã có cơ hội thử nghiệm điều này. Luôn muốn làm doanh nhân, năm 1962, ông bay đến Nhật Bản, tìm một thương hiệu giày đủ tốt để hiện thực hóa ước mơ của mình. Tại Kobe, ông cuối cùng cũng tìm được hãng giày Onitsuka (hiện là Asics). Hai bên ký hợp đồng, và Knight bắt đầu nhập khẩu giày Tiger của họ để bán sang Mỹ với quy mô nhỏ.&lt;/p&gt;&lt;p&gt;Bowerman ủng hộ việc kinh doanh của Knight và góp vốn 50% vào công ty mới của cả hai - Blue Ribbon Sports (BRS). BRS thành lập năm 1964 với số vốn chỉ 1.000 USD. Knight thậm chí đã phải vay tiền từ cha mình.&lt;/p&gt;&lt;figure class=&quot;image&quot;&gt;&lt;img src=&quot;https://i1-kinhdoanh.vnecdn.net/2023/02/25/Bill-Bowerman-and-Phil-Knight-9174-6445-1677339846.jpg?w=680&amp;amp;h=0&amp;amp;q=100&amp;amp;dpr=1&amp;amp;fit=crop&amp;amp;s=Cdy6_UTwzPsRcplWknB0bg&quot; alt=&quot;Bill Bowerman (trái) và Phil Knight năm 1999. Ảnh: Nike&quot;&gt;&lt;figcaption&gt;&lt;span style=&quot;background-color:rgb(252,250,246);color:rgb(34,34,34);&quot;&gt;Bill Bowerman (trái) và Phil Knight năm 1999. Ảnh:&lt;/span&gt;&lt;i&gt; Nike&lt;/i&gt;&lt;/figcaption&gt;&lt;/figure&gt;&lt;p&gt;Ban đầu, Knight bán giày trên xe hơi với quy mô nhỏ để thử nghiệm. Rất nhanh sau đó, họ nhận ra người dùng có nhu cầu mua giày rẻ hơn mà vẫn có chất lượng cao, thay thế cho giày Adidas và Puma vốn đang thống trị thị trường. Cả hai sau đó liên tục tăng đặt hàng, cho đến khi phải thuê thêm người để đáp ứng nhu cầu ngày càng lớn, &lt;i&gt;CNBC&lt;/i&gt; cho biết.&lt;/p&gt;&lt;p&gt;Năm 1965, Bowerman đề xuất thiết kế giày mới cho Onitsuka, nhằm hỗ trợ người chạy tối đa. Thiết kế này nhanh chóng đem đến thành công, nhưng cũng là nguồn cơn gây rạn nứt mối quan hệ giữa BRS và nhà cung cấp Nhật Bản. Mẫu giày này được đặt tên Tiger Cortez, ra mắt năm 1967 và được ưa chuộng nhờ sự thoải mái, thiết kế thời trang.&lt;/p&gt;&lt;p&gt;Tuy nhiên, việc này cũng khiến quan hệ hai bên đi xuống. Knight cho rằng công ty Nhật Bản đang tìm cách phá bỏ hợp đồng độc quyền với BRS. Bên cạnh đó, việc giao hàng không phải lúc nào cũng đúng hạn.&lt;/p&gt;&lt;p&gt;Knight còn gặp nhiều rắc rối tài chính. Dù doanh thu liên tục tăng gấp đôi, các ngân hàng vẫn lưỡng lự khi cho ông vay.&lt;/p&gt;&lt;p&gt;Năm 1971, BRS và Onitsuka Tiger chấm dứt hợp tác. BRS gần như phải bắt đầu lại mọi thứ. Knight, Bowerman và 45 nhân viên khi đó phải tìm nhà máy mới để sản xuất giày. Họ thậm chí còn phải tìm tên mới cho công ty.&lt;/p&gt;&lt;p&gt;Trong hồi ký, Knight cho biết ban đầu, ông định đặt tên công ty là Dimension 6. Nhưng sau đó, &quot;Khi Jeff Johnson nghĩ ra tên Nike, tôi cũng không biết mình có thích không nữa. Nhưng dù sao nó cũng hay hơn các tên khác&quot;, ông nhớ lại. Johnson là nhân viên đầu tiên của Nike. Ông nghĩ ra từ Nike sau khi nhìn thấy tên nữ thần chiến thắng trong thần thoại Hy Lạp.&lt;/p&gt;&lt;p&gt;Họ cũng phải thiết kế logo mới. Vì thế, Knight đến gặp Carolyn Davis – sinh viên thiết kế tại Trường đại học Portland gần đó. Davis lấy giá 35 USD cho hình swoosh – dấu phẩy hướng lên trên.&lt;/p&gt;&lt;p&gt;Việc kinh doanh của Nike sau đó khá thành công, nhờ giày Cortez và Waffle Trainer. Bowerman lấy ý tưởng sản phẩm từ chiếc bánh waffle (bánh tổ ong) của vợ mình.&lt;/p&gt;&lt;p&gt;Nike sau đó liên tục phát triển, một phần nhờ các chiến dịch quảng cáo thông minh, nổi tiếng nhất là Just Do It năm 1988. Việc hợp tác với người nổi tiếng cũng góp phần đáng kể vào thành công của họ. Nike đã ký hợp đồng với nhiều vận động viên như Tiger Woods, Kobe Bryant và Lebron James trong giai đoạn đầu sự nghiệp của họ.&lt;/p&gt;&lt;p&gt;Sự hợp tác được đánh giá thành công nhất là với Michael Jordan. Nike ký hợp đồng trước cả khi Jordan trở thành ngôi sao. Dòng sản phẩm hợp tác mang tên Air Jordan cũng đem về 100 triệu USD doanh thu cho Nike cuối năm 1985. Đến nay, Air Jordan vẫn là con gà đẻ trứng vàng cho hãng này.&lt;/p&gt;&lt;p&gt;Sự đồng hành của Knight và Bowerman là ví dụ kinh điển cho sự hợp tác giữa tinh thần khởi nghiệp và khả năng sáng tạo. Bowerman nổi tiếng với những thiết kế giày mang tính đột phá. Còn Knight có những ý tưởng marketing hiệu quả, như thông báo &quot;4 trên 7 người về đích đầu tiên&quot; trong môn marathon tại đợt tuyển chọn vận động viên Olympic Mỹ 1972 là đi giày Nike.&lt;/p&gt;&lt;p&gt;Trong một cuộc phỏng vấn năm 2017 tại Trường Kinh doanh Stanford, được đăng tải trên website trường này, Knight kể lại rằng Bowerman không chỉ dạy ông cách chạy, mà còn tạo ra nền tảng giúp ông biết cách đáp trả sự cạnh tranh. &quot;Ông ấy muốn người trẻ biết rằng họ cần chuẩn bị cho sự cạnh tranh suốt đời, chứ không chỉ là 4 năm trong đội tuyển trường đại học&quot;, Knight nhớ lại.&lt;/p&gt;&lt;p&gt;Năm 1980, Nike làm IPO. Knight lập tức trở thành triệu phú với số cổ phiếu trị giá 178 triệu USD. Hiện tại, Knight sở hữu 45,3 tỷ USD, theo&lt;i&gt; Forbes,&lt;/i&gt; và là người giàu thứ 17 tại Mỹ. Năm 2016, ông rời Nike, nhường vị trí chủ tịch cho Mark Parker sau 52 năm gắn bó với công ty. Bowerman thì đã qua đời năm 1999 ở tuổi 88.&lt;/p&gt;&lt;p&gt;Nike hiện tại là thương hiệu đồ thể thao hàng đầu thế giới, cùng với Adidas và Puma. Năm 2022, họ có gần 80.000 nhân viên trên toàn cầu. Doanh thu tài khóa 2022 đạt 46,7 tỷ USD, tăng 2 tỷ USD so với năm trước đó.&lt;/p&gt;&lt;p&gt;Cũng trong cuộc phỏng vấn năm 2017 tại Stanford, Knight đã đề cao giá trị của việc học đại học. &quot;Bill Gates và Steve Jobs bỏ học sau một năm và khởi nghiệp rất thành công. Nhưng trường hợp của tôi thì ngược lại. Tôi viết ra kế hoạch về công ty sau này trở thành Nike trong một lớp học ở Stanford&quot;, ông nói.&lt;/p&gt;&lt;p&gt;Và khi được hỏi lời khuyên cho doanh nhân khởi nghiệp, Knight cho biết họ cần chuẩn bị đối mặt với nhiều khó khăn và những bước lùi không ngờ tới. &quot;Với các doanh nhân, mỗi ngày đều là một cuộc khủng hoảng&quot;, ông kết luận.&lt;/p&gt;', 'article-NPNwZ.jpg', 0, 'tin-tuc', '2024-01-10 19:40:26', '2024-01-10 19:42:36', NULL),
(12, '4 kiểu giày được khuyên mix với quần jeans, giúp nàng ‘hack dáng’ ngoạn mục', '&lt;p&gt;&lt;strong&gt;Bất kể nàng cao hay thấp thì đều nên mua 4 kiểu &lt;/strong&gt;&lt;a href=&quot;https://vietgiaitri.com/giay-key/&quot;&gt;&lt;strong&gt;giày&lt;/strong&gt;&lt;/a&gt;&lt;strong&gt; này về để phối với &lt;/strong&gt;&lt;a href=&quot;https://vietgiaitri.com/quan-jeans-key/&quot;&gt;&lt;strong&gt;quần jeans&lt;/strong&gt;&lt;/a&gt;&lt;strong&gt;. &lt;/strong&gt;Quần jeans mix với giày &lt;a href=&quot;https://vietgiaitri.com/the-thao-cat/&quot;&gt;thể thao&lt;/a&gt; sẽ tạo ra vẻ ngoài năng động, trẻ trung nhưng chúng không thực sự mang lại hiệu quả trong việc tăng chiều cao cũng như giúp vóc dáng thêm thon thả, nhẹ nhàng. Để đạt được những tiêu chí này, bạn nên sắm thêm cho bản thân 1 trong 4 mẫu giày thời thượng và sành điệu như: &lt;a href=&quot;https://vietgiaitri.com/boots-mui-nhon-key/&quot;&gt;boots mũi nhọn&lt;/a&gt;, &lt;a href=&quot;https://vietgiaitri.com/boots-dui-key/&quot;&gt;boots đùi&lt;/a&gt;, &lt;a href=&quot;https://vietgiaitri.com/giay-cao-got-key/&quot;&gt;giày cao gót&lt;/a&gt; mũi nhọn và giày mary jane cao gót. Vậy 4 item này có ưu đ.iểm gì mà được nhiều tín đồ &lt;a href=&quot;https://vietgiaitri.com/thoi-trang-cat/&quot;&gt;thời trang&lt;/a&gt; ưa chuộng để mix với quần jeans đến thế?&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Boots đùi&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;background-color:rgb(255,255,255);color:rgb(51,51,51);&quot;&gt;Cứ đến mùa đông, những đôi boots đùi sẽ lấy lại vị thế của chúng trong tâm trí của phái đẹp. Kiểu giày mùa lạnh này luôn lên ngôi và trở thành xu hướng thời trang nổi bật được hội chị em lăng xê nhiệt tình. Sức hấp dẫn của boots đùi nằm ở vẻ sang xịn, sành điệu và đặc biệt là khả năng giữ ấm đôi chân cực tốt. Chưa hết, với khả năng kết hợp khá đa dạng, boots đùi sẽ giúp phong cách của bạn trở nên độc đáo, mới mẻ và sang xịn mịn hơn đó. Chính vì vậy, boots đùi chắc chắn không thể trật ra khỏi tầm ngắm của hội chị em sành ăn mặc.&lt;/span&gt;&lt;/p&gt;&lt;figure class=&quot;image&quot;&gt;&lt;img src=&quot;https://i.vietgiaitri.com/2023/12/16/4-kieu-giay-duoc-khuyen-mix-voi-quan-jeans-giup-nang-hack-dang-ngoan-muc-be9-7049231.webp&quot; alt=&quot;4 kiểu giày được khuyên mix với quần jeans, giúp nàng hack dáng ngoạn mục - Hình 2&quot;&gt;&lt;/figure&gt;&lt;p&gt;&lt;strong&gt;Boots mũi nhọn cổ thấp&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;Nếu không thích diện boots đùi, bạn hoàn toàn có thể phối quần jeans với boots cổ thấp. Tuy nhiên, các nàng nên tránh xa những đôi boots mũi vuông nếu không muốn trông thấp hơn. Thay vào đó, hãy chọn mua boots mũi nhọn vì chúng sẽ giúp bạn ăn giai vài centimet chiều cao đó. Chưa kêt, những đôi boots mũi nhọn còn trông điệu và mềm mại hơn nên có thể kết hợp cùng những trang phục điệu đà như váy đầm nữ tính.&lt;/p&gt;', NULL, 1, 'tin-tuc', '2024-01-10 19:43:55', '2024-01-10 19:49:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `table_color`
--

CREATE TABLE `table_color` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_color`
--

INSERT INTO `table_color` (`id`, `code`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '#000000', 'Đen', '2024-01-05 09:38:51', '2024-01-05 09:38:51', NULL),
(2, '#ff0000', 'Đỏ', '2024-01-05 09:38:59', '2024-01-05 09:38:59', NULL),
(3, '#ffffff', 'Trắng', '2024-01-05 09:39:07', '2024-01-05 09:39:07', NULL),
(4, '#0008ff', 'Xanh dương', '2024-01-05 09:39:36', '2024-01-05 09:39:36', NULL),
(5, '#ff7b00', 'Cam', '2024-01-05 09:56:46', '2024-01-05 09:56:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `table_comment`
--

CREATE TABLE `table_comment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED DEFAULT NULL,
  `id_product` bigint(20) UNSIGNED DEFAULT NULL,
  `content` mediumtext DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `comment_name` varchar(255) DEFAULT NULL,
  `content_parent_comment` int(11) DEFAULT NULL,
  `status` int(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_comment`
--

INSERT INTO `table_comment` (`id`, `id_user`, `id_product`, `content`, `avatar`, `comment_name`, `content_parent_comment`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(34, 2, 2, 'xmvnx', 'avatar-CN41M.jpg', NULL, 0, 1, '2024-01-10 19:54:49', '2024-01-10 19:54:58', NULL),
(35, 1, 2, 'admin ne', 'avatar-KwvBE.jpg', 'HL Shoes Store ', 34, 1, '2024-01-10 19:55:15', '2024-01-10 19:55:15', NULL),
(36, 2, 7, 'asdaasd', 'avatar-CN41M.jpg', NULL, 0, 0, '2024-01-10 21:21:09', '2024-01-10 21:21:09', NULL),
(37, 2, 7, 'WQEQW', 'avatar-CN41M.jpg', NULL, 0, 0, '2024-01-10 21:29:45', '2024-01-10 21:29:45', NULL),
(38, 2, 7, 'WQEQW', 'avatar-CN41M.jpg', NULL, 0, 0, '2024-01-10 21:29:45', '2024-01-10 21:29:45', NULL),
(39, 2, 7, 'WQEQW', 'avatar-CN41M.jpg', NULL, 0, 0, '2024-01-10 21:29:45', '2024-01-10 21:29:45', NULL),
(40, 2, 4, 'asAS', 'avatar-CN41M.jpg', NULL, 0, 1, '2024-01-10 21:29:57', '2024-01-10 21:30:16', NULL),
(41, 2, 4, 'asAS', 'avatar-CN41M.jpg', NULL, 0, 0, '2024-01-10 21:29:57', '2024-01-10 21:29:57', NULL),
(42, 2, 4, 'QWEQWE', 'avatar-CN41M.jpg', NULL, 0, 0, '2024-01-10 21:30:42', '2024-01-10 21:30:42', NULL),
(43, 2, 4, 'QWEQWE', 'avatar-CN41M.jpg', NULL, 0, 0, '2024-01-10 21:30:42', '2024-01-10 21:30:42', NULL),
(44, 1, 4, 'CẢM ƠN BẠN', 'avatar-KwvBE.jpg', 'HL Shoes Store ', 40, 0, '2024-01-10 21:31:07', '2024-01-10 21:31:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `table_order`
--

CREATE TABLE `table_order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(5) DEFAULT NULL,
  `id_user` bigint(20) UNSIGNED DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `payment` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `total_price` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_order`
--

INSERT INTO `table_order` (`id`, `code`, `id_user`, `fullname`, `email`, `phone`, `address`, `content`, `payment`, `status`, `total_price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(21, 'HDREr', 2, 'long', 'n.hlong0307@gmail.com', '0903137252', '63 Kinh Dương Vương Q8 TP Hồ Chí Minh', NULL, 'cod', 'moidat', 950000, '2024-01-10 19:54:12', '2024-01-10 19:54:12', NULL),
(22, 'HDHXb', 2, 'long', 'n.hlong0307@gmail.com', '0903137252', '63 Kinh Dương Vương Q8 TP Hồ Chí Minh', NULL, 'vnpay', 'moidat', 2000000, '2024-01-10 20:54:07', '2024-01-10 20:54:07', NULL),
(23, 'HDJr8', 2, 'long', 'n.hlong0307@gmail.com', '0903137252', '63 Kinh Dương Vương Q8 TP Hồ Chí Minh', 'Đã thanh toán', 'vnpay', 'dathanhtoan', 3900000, '2024-01-10 20:54:50', '2024-01-10 20:54:50', NULL),
(24, 'HDCx2', 2, 'long', 'n.hlong0307@gmail.com', '0903137252', '63 Kinh Dương Vương Q8 TP Hồ Chí Minh', 'Đã thanh toán', 'vnpay', 'dathanhtoan', 2000000, '2024-01-10 20:55:38', '2024-01-10 20:55:38', NULL),
(25, 'HDaVI', 2, 'long', 'n.hlong0307@gmail.com', '0903137252', '63 Kinh Dương Vương Q8 TP Hồ Chí Minh', NULL, 'cod', 'dathanhtoan', 32000000, '2024-01-10 21:14:28', '2024-01-10 21:14:59', NULL),
(26, 'HDmpS', 2, 'long', 'n.hlong0307@gmail.com', '0903137252', '63 Kinh Dương Vương Q8 TP Hồ Chí Minh', NULL, 'vnpay', 'moidat', 8000000, '2024-01-10 21:25:48', '2024-01-10 21:25:48', NULL),
(27, 'HDG2K', 2, 'long', 'n.hlong0307@gmail.com', '0903137252', '63 Kinh Dương Vương Q8 TP Hồ Chí Minh', 'Đã thanh toán', 'vnpay', 'dathanhtoan', 8000000, '2024-01-10 21:26:33', '2024-01-10 21:26:33', NULL),
(28, 'HDkZc', 2, 'long', 'n.hlong0307@gmail.com', '0903137252', '63 Kinh Dương Vương Q8 TP Hồ Chí Minh', NULL, 'vnpay', 'moidat', 1950000, '2024-01-11 08:25:11', '2024-01-11 08:25:11', NULL),
(29, 'HDHXc', 2, 'long', 'n.hlong0307@gmail.com', '0903137252', '63 Kinh Dương Vương Q8 TP Hồ Chí Minh', 'Đã thanh toán', 'vnpay', 'dathanhtoan', 1950000, '2024-01-11 08:25:54', '2024-01-11 08:25:54', NULL),
(30, 'HDrqj', 2, 'long', 'n.hlong0307@gmail.com', '0903137252', '63 Kinh Dương Vương Q8 TP Hồ Chí Minh', 'đóng gói kỹ kỹ nhe bà', 'vnpay', 'dathanhtoan', 3600000, '2024-01-11 08:30:51', '2024-01-11 08:30:51', NULL),
(31, 'HDoLm', 2, 'long', 'n.hlong0307@gmail.com', '0903137252', '63 Kinh Dương Vương Q8 TP Hồ Chí Minh', 'Đã thanh toán', 'vnpay', 'dathanhtoan', 3900000, '2024-01-11 08:33:54', '2024-01-11 08:33:54', NULL),
(32, 'HD8sy', 2, 'long', 'n.hlong0307@gmail.com', '0903137252', '63 Kinh Dương Vương Q8 TP Hồ Chí Minh', 'Đã thanh toán', 'vnpay', 'dathanhtoan', 950000, '2024-01-11 08:55:54', '2024-01-11 08:55:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `table_order_detail`
--

CREATE TABLE `table_order_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_order` bigint(20) UNSIGNED DEFAULT NULL,
  `id_user` bigint(20) UNSIGNED DEFAULT NULL,
  `id_product` bigint(20) UNSIGNED DEFAULT NULL,
  `id_color` bigint(20) UNSIGNED DEFAULT NULL,
  `id_size` bigint(20) UNSIGNED DEFAULT NULL,
  `name_product` varchar(255) DEFAULT NULL,
  `photo_product` varchar(255) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_order_detail`
--

INSERT INTO `table_order_detail` (`id`, `id_order`, `id_user`, `id_product`, `id_color`, `id_size`, `name_product`, `photo_product`, `price`, `quantity`, `created_at`, `updated_at`, `deleted_at`) VALUES
(23, 21, 2, 2, 3, 2, 'Chuck 70s High', 'product-EhBh4.jpg', 950000, 1, '2024-01-10 19:54:12', '2024-01-10 19:54:12', NULL),
(24, 22, 2, 4, 3, 3, 'ADIDAS SUPERSTAR', 'product-lZy9x.jpg', 2000000, 1, '2024-01-10 20:54:07', '2024-01-10 20:54:07', NULL),
(25, 23, 2, 3, 3, 3, 'JORDAN STADIUM 90', 'product-Rks2i.jpeg', 3900000, 1, '2024-01-10 20:54:50', '2024-01-10 20:54:50', NULL),
(26, 24, 2, 4, 3, 2, 'ADIDAS SUPERSTAR', 'product-lZy9x.jpg', 2000000, 1, '2024-01-10 20:55:38', '2024-01-10 20:55:38', NULL),
(27, 25, 2, 7, 1, 3, 'YEEZY BOOST 350 PIRATE', 'product-0rNtv.jpeg', 8000000, 4, '2024-01-10 21:14:28', '2024-01-10 21:14:28', NULL),
(28, 26, 2, 7, 1, 3, 'YEEZY BOOST 350 PIRATE', 'product-0rNtv.jpeg', 8000000, 1, '2024-01-10 21:25:48', '2024-01-10 21:25:48', NULL),
(29, 27, 2, 7, 1, 3, 'YEEZY BOOST 350 PIRATE', 'product-0rNtv.jpeg', 8000000, 1, '2024-01-10 21:26:33', '2024-01-10 21:26:33', NULL),
(30, 28, 2, 1, 5, 6, 'ADIDAS YUNG CAM SONGOKU', 'product-Y5J0C.jpg', 1950000, 1, '2024-01-11 08:25:11', '2024-01-11 08:25:11', NULL),
(31, 29, 2, 1, 5, 5, 'ADIDAS YUNG CAM SONGOKU', 'product-Y5J0C.jpg', 1950000, 1, '2024-01-11 08:25:54', '2024-01-11 08:25:54', NULL),
(32, 30, 2, 5, 3, 4, 'NIKE INTERACT RUN', 'product-YvU9m.jpeg', 1800000, 2, '2024-01-11 08:30:51', '2024-01-11 08:30:51', NULL),
(33, 31, 2, 3, 3, 2, 'JORDAN STADIUM 90', 'product-Rks2i.jpeg', 3900000, 1, '2024-01-11 08:33:54', '2024-01-11 08:33:54', NULL),
(34, 32, 2, 2, 3, 4, 'Chuck 70s High', 'product-EhBh4.jpg', 950000, 1, '2024-01-11 08:55:54', '2024-01-11 08:55:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `table_photo`
--

CREATE TABLE `table_photo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_photo`
--

INSERT INTO `table_photo` (`id`, `name`, `photo`, `link`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Tên tấm hình 2', 'photo-hMOcS.jpg', NULL, 'slide', '2024-01-07 01:24:35', '2024-01-08 10:34:08', NULL),
(2, 'Tên tấm hình', 'photo-OVCAf.jpg', NULL, 'slide', '2024-01-07 01:24:43', '2024-01-08 10:33:57', NULL),
(7, NULL, '1704903654.png', NULL, 'logo', '2024-01-07 09:52:00', '2024-01-10 09:20:54', NULL),
(8, NULL, '1704826729.jpg', NULL, 'banner', '2024-01-09 11:58:49', '2024-01-09 11:58:49', NULL),
(9, NULL, '1704903699.jpg', NULL, 'slide', '2024-01-10 09:21:39', '2024-01-10 09:21:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `table_product`
--

CREATE TABLE `table_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_brand` bigint(20) UNSIGNED DEFAULT NULL,
  `id_type` bigint(20) UNSIGNED DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `content` mediumtext DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `price_regular` double DEFAULT NULL,
  `sale_price` double DEFAULT NULL,
  `view` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_product`
--

INSERT INTO `table_product` (`id`, `id_brand`, `id_type`, `code`, `name`, `content`, `photo`, `price_regular`, `sale_price`, `view`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'SP73867', 'ADIDAS YUNG CAM SONGOKU', '&lt;p&gt;&lt;span style=&quot;background-color:rgb(255,255,255);color:rgb(107,114,128);&quot;&gt;❇ Giày Sneaker&amp;nbsp;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;background-color:rgb(255,255,255);color:rgb(107,114,128);&quot;&gt;✈ Kích thước ( Size ) : 39,40,41,42,43,44,45&amp;nbsp;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;background-color:rgb(255,255,255);color:rgb(107,114,128);&quot;&gt;✈ Chất liệu : Vải dêt, cao su&amp;nbsp;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;background-color:rgb(255,255,255);color:rgb(107,114,128);&quot;&gt;✈ Sản xuất: Hàng Nhập Khẩu&amp;nbsp;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;background-color:rgb(255,255,255);color:rgb(107,114,128);&quot;&gt;✈ Màu sắc, mẫu mã giống hình 100%&amp;nbsp;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;background-color:rgb(255,255,255);color:rgb(107,114,128);&quot;&gt;✈ Ôm chân, thon gọn,Phản lực sau mỗi bước đi&amp;nbsp;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;background-color:rgb(255,255,255);color:rgb(107,114,128);&quot;&gt;❇ CHUẨN LỰA CHỌN SIZE PHÙ HỢP : Chiều dài bàn chân&amp;nbsp;&lt;/span&gt;&lt;/p&gt;', 'product-Y5J0C.jpg', 1950000, 0, '58', '2024-01-05 10:02:05', '2024-01-11 09:11:48', NULL),
(2, 3, 3, 'SP38573', 'Chuck 70s High', '&lt;p&gt;Converse 1970s là 1 trong những dòng sản phẩm bán chạy nhất của Converse.Phần đế màu trắng ngà vintage được phủ 1 lớp bóng bên ngoài là điểm nhấn riêng cho dòng 1970s, dễ vệ sinh hơn.&lt;/p&gt;', 'product-EhBh4.jpg', 1700000, 950000, '85', '2024-01-06 03:57:37', '2024-01-11 09:01:43', NULL),
(3, 5, 2, 'SP99200', 'JORDAN STADIUM 90', '', 'product-Rks2i.jpeg', 3900000, 0, '108', '2024-01-10 08:07:20', '2024-01-11 09:20:31', NULL),
(4, 1, 3, 'SP99278', 'ADIDAS SUPERSTAR', '', 'product-lZy9x.jpg', 2000000, 0, '94', '2024-01-10 08:09:38', '2024-01-11 10:15:34', NULL),
(5, 5, 3, 'SP99650', 'NIKE INTERACT RUN', '', 'product-YvU9m.jpeg', 2900000, 1800000, '34', '2024-01-10 08:16:22', '2024-01-11 10:08:45', NULL),
(6, 3, 2, 'SP01022', 'Sản phẩm test nè :)))', '', NULL, 300000, 100000, '0', '2024-01-10 08:37:21', '2024-01-10 08:42:04', '2024-01-10 08:42:04'),
(7, 1, 3, 'SP04486', 'YEEZY BOOST 350 PIRATE', '', 'product-0rNtv.jpeg', 15000000, 8000000, '35', '2024-01-10 09:35:17', '2024-01-11 08:23:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `table_product_brand`
--

CREATE TABLE `table_product_brand` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_product_brand`
--

INSERT INTO `table_product_brand` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Adidas', '2024-01-05 09:36:39', '2024-01-05 09:36:39', NULL),
(2, 'Puma', '2024-01-05 09:36:45', '2024-01-05 09:36:45', NULL),
(3, 'Converse', '2024-01-06 03:56:10', '2024-01-06 03:56:10', NULL),
(4, 'Nikee', '2024-01-07 01:54:22', '2024-01-07 01:54:29', '2024-01-07 01:54:29'),
(5, 'Nike', '2024-01-10 08:00:48', '2024-01-10 08:00:48', NULL),
(6, 'YEEZY', '2024-01-10 08:29:02', '2024-01-10 10:36:05', '2024-01-10 10:36:05');

-- --------------------------------------------------------

--
-- Table structure for table `table_product_type`
--

CREATE TABLE `table_product_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_product_type`
--

INSERT INTO `table_product_type` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Giày thể thao cho nam', '2024-01-05 09:38:28', '2024-01-05 09:38:28', NULL),
(2, 'Giày thể thao cho nữ', '2024-01-05 09:38:39', '2024-01-05 09:38:39', NULL),
(3, 'Giày thời trang', '2024-01-07 01:54:40', '2024-01-07 01:54:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `table_rating`
--

CREATE TABLE `table_rating` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_product` bigint(20) UNSIGNED DEFAULT NULL,
  `id_user` bigint(20) UNSIGNED DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_rating`
--

INSERT INTO `table_rating` (`id`, `id_product`, `id_user`, `rating`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 2, 4, '2024-01-10 19:56:21', '2024-01-10 19:56:21', NULL),
(2, 2, 2, 2, '2024-01-10 20:05:51', '2024-01-10 20:05:51', NULL),
(3, 2, 2, 5, '2024-01-10 20:13:46', '2024-01-10 20:13:46', NULL),
(4, 2, 2, 4, '2024-01-10 20:14:23', '2024-01-10 20:14:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `table_role`
--

CREATE TABLE `table_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_role`
--

INSERT INTO `table_role` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', NULL, NULL, NULL),
(2, 'User', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `table_setting`
--

CREATE TABLE `table_setting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `hotline` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fanpage` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table_size`
--

CREATE TABLE `table_size` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_size`
--

INSERT INTO `table_size` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '39', '2024-01-05 09:56:55', '2024-01-05 09:56:55', NULL),
(2, '40', '2024-01-05 09:57:01', '2024-01-05 09:57:01', NULL),
(3, '41', '2024-01-05 09:57:07', '2024-01-05 09:57:07', NULL),
(4, '42', '2024-01-05 09:57:13', '2024-01-05 09:57:13', NULL),
(5, '43', '2024-01-05 09:57:18', '2024-01-05 09:57:18', NULL),
(6, '44', '2024-01-05 09:57:29', '2024-01-05 09:57:29', NULL),
(7, '45', '2024-01-05 09:57:38', '2024-01-05 09:57:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `table_user`
--

CREATE TABLE `table_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_role` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `gender` int(11) NOT NULL DEFAULT 0,
  `birthday` date DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_user`
--

INSERT INTO `table_user` (`id`, `id_role`, `name`, `gender`, `birthday`, `email`, `phone`, `address`, `avatar`, `username`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Admin', 1, '2024-01-05', 'admin@gmail.com', '0912345678', 'Không biết', 'avatar-KwvBE.jpg', 'admin', '$2y$10$2OB3iock4GZ1Zp1JgHJq0eDgdX5BtlkHNGj7k5.zFJ6uPyNmw62Ve', '', '2024-01-05 09:36:18', '2024-01-05 09:45:32', NULL),
(2, 2, 'Long Nguyễn', 1, '2000-01-06', 'n.hlong0307@gmail.com', '0903137252', '63 Kinh Dương Vương Q8 TP Hồ Chí Minh', 'avatar-CN41M.jpg', 'long', '$2y$10$VpLh24Wj/SxeWcKpSIbTXONDQXUsNtMqv7hUbnx5OsC3euo8e9MIm', NULL, '2024-01-05 10:09:28', '2024-01-10 11:57:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `table_variants_pcs`
--

CREATE TABLE `table_variants_pcs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_product` bigint(20) UNSIGNED DEFAULT NULL,
  `id_color` bigint(20) UNSIGNED DEFAULT NULL,
  `id_size` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_variants_pcs`
--

INSERT INTO `table_variants_pcs` (`id`, `id_product`, `id_color`, `id_size`, `quantity`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 1, 5, 1, 12, '2024-01-05 10:02:05', '2024-01-05 10:02:33', NULL),
(6, 1, 5, 2, 21, '2024-01-05 10:02:05', '2024-01-05 10:02:33', NULL),
(9, 1, 5, 3, 10, '2024-01-05 10:02:05', '2024-01-07 04:09:07', NULL),
(12, 1, 5, 4, 5, '2024-01-05 10:02:05', '2024-01-05 10:02:33', NULL),
(15, 1, 5, 5, 3, '2024-01-05 10:02:05', '2024-01-11 08:25:54', NULL),
(18, 1, 5, 6, 4, '2024-01-05 10:02:05', '2024-01-05 10:02:33', NULL),
(21, 1, 5, 7, 1, '2024-01-05 10:02:05', '2024-01-05 11:37:16', NULL),
(22, 2, 3, 1, 2, '2024-01-06 03:57:37', '2024-01-06 03:58:26', NULL),
(23, 2, 3, 2, 9, '2024-01-06 03:57:37', '2024-01-07 04:07:02', NULL),
(24, 2, 3, 3, 5, '2024-01-06 03:57:37', '2024-01-07 04:09:07', NULL),
(25, 2, 3, 4, -1, '2024-01-06 03:57:37', '2024-01-11 08:55:54', NULL),
(26, 3, 3, 1, 12, '2024-01-10 08:07:20', '2024-01-10 08:07:45', NULL),
(27, 3, 3, 2, 4, '2024-01-10 08:07:20', '2024-01-11 08:33:54', NULL),
(28, 3, 3, 3, 1, '2024-01-10 08:07:20', '2024-01-10 20:54:50', NULL),
(29, 4, 3, 2, 1, '2024-01-10 08:09:38', '2024-01-10 20:55:38', NULL),
(30, 4, 3, 3, 3, '2024-01-10 08:09:38', '2024-01-10 08:09:51', NULL),
(31, 5, 3, 1, 2, '2024-01-10 08:16:22', '2024-01-10 08:16:44', NULL),
(32, 5, 3, 2, 5, '2024-01-10 08:16:22', '2024-01-10 08:16:44', NULL),
(33, 5, 3, 3, 6, '2024-01-10 08:16:22', '2024-01-10 08:16:44', NULL),
(34, 5, 3, 4, 6, '2024-01-10 08:16:22', '2024-01-11 08:30:51', NULL),
(35, 6, 3, 2, 0, '2024-01-10 08:37:21', '2024-01-10 08:37:21', NULL),
(36, 6, 3, 4, 0, '2024-01-10 08:37:21', '2024-01-10 08:37:21', NULL),
(37, 7, 1, 3, 2, '2024-01-10 09:36:04', '2024-01-10 21:26:33', NULL),
(38, 7, 1, 4, 5, '2024-01-10 09:36:04', '2024-01-10 09:45:23', NULL),
(39, 7, 1, 5, 2, '2024-01-10 09:36:04', '2024-01-10 10:34:38', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `table_album`
--
ALTER TABLE `table_album`
  ADD PRIMARY KEY (`id`),
  ADD KEY `table_album_id_product_foreign` (`id_product`);

--
-- Indexes for table `table_article`
--
ALTER TABLE `table_article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_color`
--
ALTER TABLE `table_color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_comment`
--
ALTER TABLE `table_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `table_comment_id_user_foreign` (`id_user`),
  ADD KEY `table_comment_id_product_foreign` (`id_product`);

--
-- Indexes for table `table_order`
--
ALTER TABLE `table_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `table_order_id_user_foreign` (`id_user`);

--
-- Indexes for table `table_order_detail`
--
ALTER TABLE `table_order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `table_order_detail_id_order_foreign` (`id_order`),
  ADD KEY `table_order_detail_id_product_foreign` (`id_product`),
  ADD KEY `table_order_detail_id_color_foreign` (`id_color`),
  ADD KEY `table_order_detail_id_size_foreign` (`id_size`);

--
-- Indexes for table `table_photo`
--
ALTER TABLE `table_photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_product`
--
ALTER TABLE `table_product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `table_product_code_unique` (`code`),
  ADD KEY `table_product_id_brand_foreign` (`id_brand`),
  ADD KEY `table_product_id_type_foreign` (`id_type`);

--
-- Indexes for table `table_product_brand`
--
ALTER TABLE `table_product_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_product_type`
--
ALTER TABLE `table_product_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_rating`
--
ALTER TABLE `table_rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `table_rating_id_product_foreign` (`id_product`),
  ADD KEY `table_rating_id_user_foreign` (`id_user`);

--
-- Indexes for table `table_role`
--
ALTER TABLE `table_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_setting`
--
ALTER TABLE `table_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_size`
--
ALTER TABLE `table_size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_user`
--
ALTER TABLE `table_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `table_user_id_role_foreign` (`id_role`);

--
-- Indexes for table `table_variants_pcs`
--
ALTER TABLE `table_variants_pcs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `table_variants_pcs_id_product_foreign` (`id_product`),
  ADD KEY `table_variants_pcs_id_color_foreign` (`id_color`),
  ADD KEY `table_variants_pcs_id_size_foreign` (`id_size`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_album`
--
ALTER TABLE `table_album`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `table_article`
--
ALTER TABLE `table_article`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `table_color`
--
ALTER TABLE `table_color`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `table_comment`
--
ALTER TABLE `table_comment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `table_order`
--
ALTER TABLE `table_order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `table_order_detail`
--
ALTER TABLE `table_order_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `table_photo`
--
ALTER TABLE `table_photo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `table_product`
--
ALTER TABLE `table_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `table_product_brand`
--
ALTER TABLE `table_product_brand`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `table_product_type`
--
ALTER TABLE `table_product_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `table_rating`
--
ALTER TABLE `table_rating`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `table_role`
--
ALTER TABLE `table_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `table_setting`
--
ALTER TABLE `table_setting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_size`
--
ALTER TABLE `table_size`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `table_user`
--
ALTER TABLE `table_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `table_variants_pcs`
--
ALTER TABLE `table_variants_pcs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `table_album`
--
ALTER TABLE `table_album`
  ADD CONSTRAINT `table_album_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `table_product` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `table_comment`
--
ALTER TABLE `table_comment`
  ADD CONSTRAINT `table_comment_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `table_product` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `table_comment_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `table_user` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `table_order`
--
ALTER TABLE `table_order`
  ADD CONSTRAINT `table_order_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `table_user` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `table_order_detail`
--
ALTER TABLE `table_order_detail`
  ADD CONSTRAINT `table_order_detail_id_color_foreign` FOREIGN KEY (`id_color`) REFERENCES `table_color` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `table_order_detail_id_order_foreign` FOREIGN KEY (`id_order`) REFERENCES `table_order` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `table_order_detail_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `table_product` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `table_order_detail_id_size_foreign` FOREIGN KEY (`id_size`) REFERENCES `table_size` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `table_product`
--
ALTER TABLE `table_product`
  ADD CONSTRAINT `table_product_id_brand_foreign` FOREIGN KEY (`id_brand`) REFERENCES `table_product_brand` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `table_product_id_type_foreign` FOREIGN KEY (`id_type`) REFERENCES `table_product_type` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `table_rating`
--
ALTER TABLE `table_rating`
  ADD CONSTRAINT `table_rating_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `table_product` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `table_rating_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `table_user` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `table_user`
--
ALTER TABLE `table_user`
  ADD CONSTRAINT `table_user_id_role_foreign` FOREIGN KEY (`id_role`) REFERENCES `table_role` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `table_variants_pcs`
--
ALTER TABLE `table_variants_pcs`
  ADD CONSTRAINT `table_variants_pcs_id_color_foreign` FOREIGN KEY (`id_color`) REFERENCES `table_color` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `table_variants_pcs_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `table_product` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `table_variants_pcs_id_size_foreign` FOREIGN KEY (`id_size`) REFERENCES `table_size` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
