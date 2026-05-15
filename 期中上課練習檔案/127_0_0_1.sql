-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2026-04-17 09:59:08
-- 伺服器版本： 10.4.32-MariaDB
-- PHP 版本： 8.2.12



-- ============================================================
-- 第一部分：phpMyAdmin 手動操作圖解步驟 (請先閱讀)
-- ============================================================
-- 1. 開啟 XAMPP Control Panel，確認 Apache 與 MySQL 均為 Start 狀態。
-- 2. 點擊 MySQL 旁的「Admin」按鈕，瀏覽器會自動開啟 phpMyAdmin。
-- 3. 在左側導覽列點擊「New (新增)」。
-- 4. 在右側「資料庫名稱」輸入：school
-- 5. 點擊「建立」按鈕。
-- 6. 在左側點擊剛建好的「school」資料庫，接著點擊上方選單的「SQL」標籤。
-- 7. 將本區塊下方的程式碼全部複製，貼入輸入框中。
-- 8. 點擊右下角的「執行 (Go)」，資料庫即建立完成！
-- ============================================================

-- 設定環境編碼與時區
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `school`
-- 如果資料庫 school 不存在則建立，並指定編碼為 utf8mb4 (支援中文)
--
CREATE DATABASE IF NOT EXISTS `school` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `school`;

-- --------------------------------------------------------

--
-- 資料表結構 `admin`
--
-- ------------------------------------------------------------
-- 第二部分：建立「管理者 (admin)」資料表結構
-- ------------------------------------------------------------
-- PRIMARY KEY: 主鍵 (No)，不可重複 
-- AUTO_INCREMENT: 自動編號，新增資料時不需手動輸入 No 
-- ------------------------------------------------------------

CREATE TABLE `admin` (
  `No` int(10) NOT NULL,
  `id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pwd` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `admin`
-- 插入管理者預設測試資料
--

INSERT INTO `admin` (`No`, `id`, `pwd`) VALUES
(1, 'derrick', '12345'),
(2, 'iting', 'abc123');

-- --------------------------------------------------------

--
-- 資料表結構 `student`
--
-- ------------------------------------------------------------
-- 第三部分：建立「學生 (student)」資料表結構
-- ------------------------------------------------------------
CREATE TABLE `student` (
  `No` int(10) NOT NULL,
  `name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dept` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `student`
-- 插入學生測試資料
--

INSERT INTO `student` (`No`, `name`, `dept`, `city`) VALUES
(2, '小王王', '應用化學學', '高雄雄'),
(3, '小張', '亞太', '台中');




-- ------------------------------------------------------------
-- 第四部分：設定索引與自動遞增屬性
-- ------------------------------------------------------------
--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`No`);

--
-- 資料表索引 `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`No`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `admin`
--
ALTER TABLE `admin`
  MODIFY `No` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `student`
--
ALTER TABLE `student`
  MODIFY `No` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;
-- ============================================================
-- 建立完成！你現在可以到「瀏覽」標籤查看資料。
-- ============================================================
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
 