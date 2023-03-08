create database if not exists webbear;
use webbear;

create table Category (
	CategoryId int(3) zerofill auto_increment not null,
	CategoryName varchar(200) not null,
	constraint PK_Category primary key (CategoryId),
	constraint UQ_Category unique (CategoryName)
);
create table Product (
	ProductId int(4) zerofill auto_increment not null,
	ProductName varchar(300) not null,
	ProductPrice int not null check (ProductPrice >= 0),
	ProductInventory int not null check (ProductInventory >= 0),
	ProductSize varchar(50) not null,
	ProductStatus varchar(50) not null,
	CategoryId int(3) zerofill not null,
	constraint PK_Product primary key (ProductId),
	constraint FK_Category foreign key (CategoryId) references Category(CategoryId),
	constraint UQ_Product unique (ProductName, ProductSize)
);
create table Image (
	ImageId int(4) zerofill auto_increment not null,
	ImageUrl varchar(200) not null,
	ProductId int(4) zerofill not null,
	constraint PK_Image primary key (ImageId),
	constraint FK_Product foreign key (ProductId) references Product(ProductId),
	constraint UQ_Image unique (ImageUrl, ProductId)
);
create table Roles (
	RolesId int(3) zerofill auto_increment not null,
	RolesName varchar(100) not null,
	constraint PK_Roles primary key (RolesId),
	constraint UQ_Roles unique (RolesName)
);
create table Functional (
	FunctionalId int(3) zerofill auto_increment not null,
	FunctionalName varchar(100) not null,
	constraint PK_Functional primary key (FunctionalId),
	constraint UQ_Functional unique (FunctionalName)
);
create table FunctionalDetail (
	RolesId int(3) zerofill not null,
	FunctionalId int(3) zerofill not null,
	constraint PK_FunctionalDetail primary key (RolesId, FunctionalId),
	constraint FK_RolesDetail foreign key (RolesId) references Roles(RolesId),
	constraint FK_Functional foreign key (FunctionalId) references Functional(FunctionalId),
	constraint UQ_FunctionalDetail unique (RolesId, FunctionalId)
);
create table Users (
	UsersId int(5) zerofill auto_increment not null,
	UsersAccount varchar(20) not null,
	UsersPassword varchar(30) not null,
	UsersMail varchar(50) not null,
	UsersPhone varchar(13) not null,
	UsersAddress varchar(100) default null,
	UsersName varchar(100) not null,
	RolesId int(3) zerofill not null,
	constraint PK_Users primary key (UsersId),
	constraint FK_Roles foreign key (RolesId) references Roles(RolesId),
	constraint UQ_Account unique (UsersAccount),
	constraint UQ_Phone unique (UsersPhone)
);
create table Orders (
	OrdersId int(5) zerofill auto_increment not null,
	TotalPrice int not null check (TotalPrice >= 0),
	OrdersDate date not null default current_date(),
	UsersId int(5) zerofill not null,
	constraint PK_Orders primary key (OrdersId),
	constraint FK_Users foreign key (UsersId) references Users(UsersId)
);
create table Service (
	ServiceId int(3) zerofill auto_increment not null,
	ServiceName varchar(200) not null,
	ServicePrice int not null check (ServicePrice >= 0),
	constraint PK_Service primary key (ServiceId),
	constraint UQ_Service unique (ServiceName)
);
create table ServiceDetail (
	OrdersId int(5) zerofill not null,
	ServiceId int(3) zerofill not null,
	constraint PK_ServiceDetail primary key (OrdersId, ServiceId),
	constraint FK_Orders foreign key (OrdersId) references Orders(OrdersId),
	constraint FK_Service foreign key (ServiceId) references Service(ServiceId)
);
create table OrderDetail (
	OrdersId int(5) zerofill not null,
	ProductId int(4) zerofill not null,
	OrderQuantity int not null check (OrderQuantity > 0),
	constraint PK_OrderDetail primary key (OrdersId, ProductId),
	constraint FK_OrderDetail foreign key (OrdersId) references Orders(OrdersId),
	constraint FK_ProductDetail foreign key (ProductId) references Product(ProductId)
);



Insert into Category (CategoryName) values ('Chó Bông');
Insert into Category (CategoryName) values ('Mèo Bông');
Insert into Category (CategoryName) values ('Gấu Bông');
Insert into Category (CategoryName) values ('Thú Bông Khác');
Insert into Category (CategoryName) values ('Stitch');
Insert into Category (CategoryName) values ('Totoro');
Insert into Category (CategoryName) values ('Minions');
Insert into Category (CategoryName) values ('Doraemon');
Insert into Category (CategoryName) values ('Nhân Vật Hoạt Hình Khác');
Insert into Category (CategoryName) values ('Gối Bông');
Insert into Category (CategoryName) values ('Gối Mền');
Insert into Category (CategoryName) values ('Móc Khóa');
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Chó Bông Husky Cosplay Khủng Long', 475000, 709, '100cm', 'Đang bán', 1);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Gấu Bông Chó Xám Vương Miện', 325000, 635, '55cm', 'Đang bán', 1);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Gấu Bông Chó Xám Vương Miện', 465000, 138, '70cm', 'Đang bán', 1);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Gấu Bông Chó Xám Vương Miện', 995000, 905, '90cm', 'Đang bán', 1);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Sói Xám Áo Mịn', 395000, 793, '90cm', 'Đang bán', 1);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Sói Xám Áo Mịn', 435000, 376, '100cm', 'Đang bán', 1);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Sói Xám Áo Mịn', 695000, 492, '120cm', 'Đang bán', 1);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Chó Xám Ngồi Ôm Bình Sữa', 225000, 576, '35cm', 'Đang bán', 1);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Chó Xám Ngồi Ôm Bình Sữa', 295000, 357, '45cm', 'Đang bán', 1);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Chó Xám Ngồi Ôm Bình Sữa', 395000, 640, '55cm', 'Đang bán', 1);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Chó Shiba Nằm Bắp Cải', 365000, 557, '50cm', 'Đang bán', 1);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Gấu Bông Shiba Bắp Cải Ngồi', 295000, 75, '35cm', 'Đang bán', 1);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Gấu Bông Shiba Bắp Cải Ngồi', 365000, 458, '45cm', 'Đang bán', 1);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Gấu Bông Mèo Nón Túi Hoa', 295000, 526, '50cm', 'Đang bán', 2);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Gấu Bông Mèo Nón Túi Hoa', 435000, 461, '60cm', 'Đang bán', 2);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Mèo Hoàng Thượng Cosplay Ong', 285000, 540, '40cm', 'Đang bán', 2);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Mèo Hoàng Thượng Bông Cosplay Vịt', 335000, 938, '30cm', 'Đang bán', 2);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Mèo Bông Cosplay Khủng Long', 175000, 19, '30cm', 'Đang bán', 2);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Mèo Bông Cosplay', 175000, 225, '30cm', 'Đang bán', 2);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Gấu Bông Teddy Váy Hàn Quốc', 225000, 0, '60cm', 'Ngừng kinh doanh', 3);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Gấu Bông Teddy Váy Hàn Quốc', 355000, 0, '80cm', 'Ngừng kinh doanh', 3);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Gấu Bông Teddy Váy Hàn Quốc', 535000, 784, '100cm', 'Đang bán', 3);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Gấu Bông Teddy Ôm Tim Màu', 395000, 0, '80cm', 'Ngừng kinh doanh', 3);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Gấu Bông Teddy Ôm Tim Màu', 695000, 0, '110cm', 'Ngừng kinh doanh', 3);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Gấu Bông Teddy Ôm Tim Màu', 895000, 0, '130cm', 'Ngừng kinh doanh', 3);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Gấu Bông Teddy Ôm Tim Màu', 955000, 38, '150cm', 'Đang bán', 3);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Gấu Bông Teddy Nơ', 355000, 889, '80cm', 'Đang bán', 3);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Gấu Bông Teddy Nơ', 625000, 94, '110cm', 'Đang bán', 3);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Gấu Bông Teddy Angel Tím', 425000, 482, '80cm', 'Đang bán', 3);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Gấu Bông Teddy Angel Tím', 595000, 768, '110cm', 'Đang bán', 3);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Gấu Bông Teddy Angel Tím', 895000, 623, '140cm', 'Đang bán', 3);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Gấu Bông Teddy Angel Tím', 1200000, 836, '160cm', 'Đang bán', 3);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Bánh Mì Trứng Bông', 125000, 488, '20cm', 'Đang bán', 4);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Bánh Mì Trứng Bông', 225000, 44, '40cm', 'Đang bán', 4);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Bánh Mì Trứng Bông', 325000, 245, '50cm', 'Đang bán', 4);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Sâu Bông Nhũ Đeo Nơ', 335000, 266, '90cm', 'Đang bán', 10);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Vịt Bông Mũ Cam', 175000, 949, '40cm', 'Đang bán', 4);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Vịt Bông Mũ Cam', 275000, 439, '50cm', 'Đang bán', 4);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Vịt Bông Mũ Cam', 435000, 804, '65cm', 'Đang bán', 4);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Vịt Bông Mũ Cam', 695000, 271, '85cm', 'Đang bán', 4);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Ốc Sên Bông', 125000, 741, '20cm', 'Đang bán', 4);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Ốc Sên Bông', 175000, 770, '30cm', 'Đang bán', 4);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Ốc Sên Bông', 250000, 503, '45cm', 'Đang bán', 4);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Ốc Sên Bông', 325000, 246, '60cm', 'Đang bán', 4);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Voi Bông Băng Đô', 265000, 947, '50c', 'Đang bán', 4);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Voi Bông Băng Đô', 355000, 477, '60cm', 'Đang bán', 4);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Gấu Nhỏ Rùa Bông', 75000, 131, '20cm', 'Đang bán', 4);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Gấu Bông Stitch Mềm', 255000, 409, '40cm', 'Đang bán', 5);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Gấu Bông Stitch Mềm', 435000, 189, '80cm', 'Đang bán', 5);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Gấu Bông Stitch Mềm', 835000, 825, '100cm', 'Đang bán', 5);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Gấu Bông Stitch Hồng', 425000, 967, '60cm', 'Đang bán', 5);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Stitch Bự', 495000, 545, '60cm', 'Đang bán', 5);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Stitch Bự', 695000, 414, '80cm', 'Đang bán', 5);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Stitch Bự', 1050000, 314, '120cm', 'Đang bán', 5);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Totoro Bông Nhỏ', 75000, 596, '25cm', 'Đang bán', 6);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Totoro Bông Mịn', 255000, 894, '40cm', 'Đang bán', 6);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Totoro Bông Mịn', 395000, 965, '50cm', 'Đang bán', 6);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Totoro Bông Mịn', 555000, 100, '75cm', 'Đang bán', 6);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Totoro Bông Mềm', 135000, 408, '25cm', 'Đang bán', 6);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Totoro Bông Mềm', 215000, 33, '40cm', 'Đang bán', 6);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Minion 3D Mắt Bông', 145000, 130, '35cm', 'Đang bán', 7);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Minion 3D Mắt Bông', 265000, 195, '45cm', 'Đang bán', 7);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Doremon Bông Thiên Thần', 145000, 806, '25cm', 'Đang bán', 8);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Gấu Bông Doraemon Ôm Bánh', 235000, 52, '40cm', 'Đang bán', 8);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Gấu Bông Doraemon Ôm Bánh', 395000, 118, '60cm', 'Đang bán', 8);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Gấu Bông Doraemon Ôm Bánh', 585000, 922, '70cm', 'Đang bán', 8);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Gấu Bông Doraemon Ôm Bánh', 835000, 382, '90cm', 'Đang bán', 8);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Gấu Bông Kitty Váy Caro', 195000, 218, '30cm', 'Đang bán', 9);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Gấu Bông Kitty Váy Caro', 275000, 294, '45cm', 'Đang bán', 9);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Pikachu Bông Mềm', 255000, 198, '50cm', 'Đang bán', 9);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Gối Ôm Thỏ Tai Dâu Nằm', 175000, 252, '60cm', 'Đang bán', 10);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Gối Ôm Thỏ Tai Dâu Nằm', 265000, 776, '80cm', 'Đang bán', 10);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Gối Ôm Thỏ Tai Dâu Nằm', 435000, 241, '100cm', 'Đang bán', 10);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Gối Ôm Thỏ Tai Dâu Nằm', 555000, 305, '120cm', 'Đang bán', 10);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Gối Ôm Thỏ Hoa', 265000, 690, '90cm', 'Đang bán', 10);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Gối Ôm Sâu Đậu Cảm Xúc', 225000, 489, '55cm', 'Đang bán', 10);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Gối Ôm Sâu Đậu Cảm Xúc', 355000, 533, '80cm', 'Đang bán', 10);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Gối Ôm Sâu Đậu Cảm Xúc', 555000, 126, '100cm', 'Đang bán', 10);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Gối Tựa Khúc Xương', 335000, 660, '50cm', 'Đang bán', 10);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Gối Cổ Thú', 90000, 153, '35cm', 'Đang bán', 10);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Gối Mền - Chó Shiba Nằm', 355000, 847, '60cm', 'Đang bán', 11);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Gối Chăn Mền Khủng Long Mắt Tròn', 345000, 712, '60cm', 'Đang bán', 11);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Gối Mền - Thú Đút Tay', 325000, 793, '40cm', 'Đang bán', 11);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Móc Khóa Kitty', 35000, 70, 'Mini', 'Đang bán', 12);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Móc Khóa Bông Totoro', 35000, 465, 'Mini', 'Đang bán', 12);
Insert into Image (ImageUrl,ProductId) values ('img-3-1.png', 1);
Insert into Image (ImageUrl,ProductId) values ('img-3-2.png', 1);
Insert into Image (ImageUrl,ProductId) values ('img-3-3.png', 1);
Insert into Image (ImageUrl,ProductId) values ('img-4-4.png', 2);
Insert into Image (ImageUrl,ProductId) values ('img-4-5.png', 2);
Insert into Image (ImageUrl,ProductId) values ('img-4-6.png', 3);
Insert into Image (ImageUrl,ProductId) values ('img-4-7.png', 4);
Insert into Image (ImageUrl,ProductId) values ('img-6-8.png', 5);
Insert into Image (ImageUrl,ProductId) values ('img-6-9.png', 6);
Insert into Image (ImageUrl,ProductId) values ('img-7-10.png', 8);
Insert into Image (ImageUrl,ProductId) values ('img-7-11.png', 9);
Insert into Image (ImageUrl,ProductId) values ('img-8-12.png', 11);
Insert into Image (ImageUrl,ProductId) values ('img-8-13.png', 11);
Insert into Image (ImageUrl,ProductId) values ('img-8-14.png', 11);
Insert into Image (ImageUrl,ProductId) values ('img-9-15.png', 12);
Insert into Image (ImageUrl,ProductId) values ('img-9-16.png', 13);
Insert into Image (ImageUrl,ProductId) values ('img-11-17.png', 14);
Insert into Image (ImageUrl,ProductId) values ('img-13-18.png', 16);
Insert into Image (ImageUrl,ProductId) values ('img-13-19.png', 16);
Insert into Image (ImageUrl,ProductId) values ('img-14-20.png', 17);
Insert into Image (ImageUrl,ProductId) values ('img-14-21.png', 17);
Insert into Image (ImageUrl,ProductId) values ('img-14-22.png', 17);
Insert into Image (ImageUrl,ProductId) values ('img-16-23.png', 18);
Insert into Image (ImageUrl,ProductId) values ('img-16-24.png', 18);
Insert into Image (ImageUrl,ProductId) values ('img-17-25.png', 19);
Insert into Image (ImageUrl,ProductId) values ('img-17-26.png', 19);
Insert into Image (ImageUrl,ProductId) values ('img-17-27.png', 19);
Insert into Image (ImageUrl,ProductId) values ('img-19-28.png', 20);
Insert into Image (ImageUrl,ProductId) values ('img-19-29.png', 21);
Insert into Image (ImageUrl,ProductId) values ('img-20-30.png', 23);
Insert into Image (ImageUrl,ProductId) values ('img-21-31.png', 27);
Insert into Image (ImageUrl,ProductId) values ('img-22-32.png', 29);
Insert into Image (ImageUrl,ProductId) values ('img-22-33.png', 39);
Insert into Image (ImageUrl,ProductId) values ('img-23-34.png', 33);
Insert into Image (ImageUrl,ProductId) values ('img-23-35.png', 32);
Insert into Image (ImageUrl,ProductId) values ('img-24-36.png', 36);
Insert into Image (ImageUrl,ProductId) values ('img-24-37.png', 36);
Insert into Image (ImageUrl,ProductId) values ('img-24-38.png', 36);
Insert into Image (ImageUrl,ProductId) values ('img-25-39.png', 37);
Insert into Image (ImageUrl,ProductId) values ('img-25-40.png', 38);
Insert into Image (ImageUrl,ProductId) values ('img-25-41.png', 39);
Insert into Image (ImageUrl,ProductId) values ('img-25-42.png', 40);
Insert into Image (ImageUrl,ProductId) values ('img-26-43.png', 41);
Insert into Image (ImageUrl,ProductId) values ('img-26-44.png', 42);
Insert into Image (ImageUrl,ProductId) values ('img-26-45.png', 43);
Insert into Image (ImageUrl,ProductId) values ('img-26-46.png', 44);
Insert into Image (ImageUrl,ProductId) values ('img-27-47.png', 45);
Insert into Image (ImageUrl,ProductId) values ('img-28-48.png', 47);
Insert into Image (ImageUrl,ProductId) values ('img-29-49.png', 48);
Insert into Image (ImageUrl,ProductId) values ('img-30-50.png', 51);
Insert into Image (ImageUrl,ProductId) values ('img-31-51.png', 52);
Insert into Image (ImageUrl,ProductId) values ('img-32-52.png', 55);
Insert into Image (ImageUrl,ProductId) values ('img-32-53.png', 55);
Insert into Image (ImageUrl,ProductId) values ('img-33-54.png', 56);
Insert into Image (ImageUrl,ProductId) values ('img-34-55.png', 59);
Insert into Image (ImageUrl,ProductId) values ('img-34-56.png', 60);
Insert into Image (ImageUrl,ProductId) values ('img-36-57.png', 61);
Insert into Image (ImageUrl,ProductId) values ('img-36-58.png', 62);
Insert into Image (ImageUrl,ProductId) values ('img-37-59.png', 63);
Insert into Image (ImageUrl,ProductId) values ('img-37-60.png', 63);
Insert into Image (ImageUrl,ProductId) values ('img-38-61.png', 64);
Insert into Image (ImageUrl,ProductId) values ('img-38-62.png', 65);
Insert into Image (ImageUrl,ProductId) values ('img-39-63.png', 68);
Insert into Image (ImageUrl,ProductId) values ('img-40-64.png', 70);
Insert into Image (ImageUrl,ProductId) values ('img-40-65.png', 70);
Insert into Image (ImageUrl,ProductId) values ('img-42-66.png', 71);
Insert into Image (ImageUrl,ProductId) values ('img-42-67.png', 72);
Insert into Image (ImageUrl,ProductId) values ('img-42-68.png', 73);
Insert into Image (ImageUrl,ProductId) values ('img-42-69.png', 74);
Insert into Image (ImageUrl,ProductId) values ('img-43-70.png', 75);
Insert into Image (ImageUrl,ProductId) values ('img-43-71.png', 75);
Insert into Image (ImageUrl,ProductId) values ('img-43-72.png', 75);
Insert into Image (ImageUrl,ProductId) values ('img-44-73.png', 76);
Insert into Image (ImageUrl,ProductId) values ('img-44-74.png', 77);
Insert into Image (ImageUrl,ProductId) values ('img-44-75.png', 78);
Insert into Image (ImageUrl,ProductId) values ('img-45-76.png', 79);
Insert into Image (ImageUrl,ProductId) values ('img-46-77.png', 80);
Insert into Image (ImageUrl,ProductId) values ('img-47-78.png', 81);
Insert into Image (ImageUrl,ProductId) values ('img-48-79.png', 82);
Insert into Image (ImageUrl,ProductId) values ('img-48-80.png', 82);
Insert into Image (ImageUrl,ProductId) values ('img-48-81.png', 82);
Insert into Image (ImageUrl,ProductId) values ('img-49-82.png', 83);
Insert into Image (ImageUrl,ProductId) values ('img-50-83.png', 84);
Insert into Image (ImageUrl,ProductId) values ('img-51-84.png', 85);
Insert into Image (ImageUrl,ProductId) values ('img-51-85.png', 85);





















