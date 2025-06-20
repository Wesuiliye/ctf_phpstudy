-- 使用phptopic数据库
USE phptopic;

-- 创建数据表（添加IF NOT EXISTS避免冲突）
CREATE TABLE IF NOT EXISTS `users` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `username` VARCHAR(50) NOT NULL,
  `password` VARCHAR(255) NOT NULL,  # 添加password字段
  `email` VARCHAR(100) NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 插入初始数据（包含password字段）
INSERT INTO `users` (`username`, `password`, `email`) VALUES
('admin', 'fjaskl@E#Rfajslkd#A', 'admin@example.com');