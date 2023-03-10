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



Insert into Category (CategoryName) values ('Ch?? B??ng');
Insert into Category (CategoryName) values ('M??o B??ng');
Insert into Category (CategoryName) values ('G???u B??ng');
Insert into Category (CategoryName) values ('Th?? B??ng Kh??c');
Insert into Category (CategoryName) values ('Stitch');
Insert into Category (CategoryName) values ('Totoro');
Insert into Category (CategoryName) values ('Minions');
Insert into Category (CategoryName) values ('Doraemon');
Insert into Category (CategoryName) values ('Nh??n V???t Ho???t H??nh Kh??c');
Insert into Category (CategoryName) values ('G???i B??ng');
Insert into Category (CategoryName) values ('G???i M???n');
Insert into Category (CategoryName) values ('M??c Kh??a');
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Ch?? B??ng Husky Cosplay Kh???ng Long', 475000, 709, '100cm', '??ang b??n', 1);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('G???u B??ng Ch?? X??m V????ng Mi???n', 325000, 635, '55cm', '??ang b??n', 1);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('G???u B??ng Ch?? X??m V????ng Mi???n', 465000, 138, '70cm', '??ang b??n', 1);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('G???u B??ng Ch?? X??m V????ng Mi???n', 995000, 905, '90cm', '??ang b??n', 1);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('S??i X??m ??o M???n', 395000, 793, '90cm', '??ang b??n', 1);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('S??i X??m ??o M???n', 435000, 376, '100cm', '??ang b??n', 1);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('S??i X??m ??o M???n', 695000, 492, '120cm', '??ang b??n', 1);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Ch?? X??m Ng???i ??m B??nh S???a', 225000, 576, '35cm', '??ang b??n', 1);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Ch?? X??m Ng???i ??m B??nh S???a', 295000, 357, '45cm', '??ang b??n', 1);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Ch?? X??m Ng???i ??m B??nh S???a', 395000, 640, '55cm', '??ang b??n', 1);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Ch?? Shiba N???m B???p C???i', 365000, 557, '50cm', '??ang b??n', 1);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('G???u B??ng Shiba B???p C???i Ng???i', 295000, 75, '35cm', '??ang b??n', 1);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('G???u B??ng Shiba B???p C???i Ng???i', 365000, 458, '45cm', '??ang b??n', 1);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('G???u B??ng M??o N??n T??i Hoa', 295000, 526, '50cm', '??ang b??n', 2);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('G???u B??ng M??o N??n T??i Hoa', 435000, 461, '60cm', '??ang b??n', 2);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('M??o Ho??ng Th?????ng Cosplay Ong', 285000, 540, '40cm', '??ang b??n', 2);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('M??o Ho??ng Th?????ng B??ng Cosplay V???t', 335000, 938, '30cm', '??ang b??n', 2);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('M??o B??ng Cosplay Kh???ng Long', 175000, 19, '30cm', '??ang b??n', 2);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('M??o B??ng Cosplay', 175000, 225, '30cm', '??ang b??n', 2);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('G???u B??ng Teddy V??y H??n Qu???c', 225000, 0, '60cm', 'Ng???ng kinh doanh', 3);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('G???u B??ng Teddy V??y H??n Qu???c', 355000, 0, '80cm', 'Ng???ng kinh doanh', 3);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('G???u B??ng Teddy V??y H??n Qu???c', 535000, 784, '100cm', '??ang b??n', 3);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('G???u B??ng Teddy ??m Tim M??u', 395000, 0, '80cm', 'Ng???ng kinh doanh', 3);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('G???u B??ng Teddy ??m Tim M??u', 695000, 0, '110cm', 'Ng???ng kinh doanh', 3);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('G???u B??ng Teddy ??m Tim M??u', 895000, 0, '130cm', 'Ng???ng kinh doanh', 3);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('G???u B??ng Teddy ??m Tim M??u', 955000, 38, '150cm', '??ang b??n', 3);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('G???u B??ng Teddy N??', 355000, 889, '80cm', '??ang b??n', 3);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('G???u B??ng Teddy N??', 625000, 94, '110cm', '??ang b??n', 3);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('G???u B??ng Teddy Angel T??m', 425000, 482, '80cm', '??ang b??n', 3);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('G???u B??ng Teddy Angel T??m', 595000, 768, '110cm', '??ang b??n', 3);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('G???u B??ng Teddy Angel T??m', 895000, 623, '140cm', '??ang b??n', 3);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('G???u B??ng Teddy Angel T??m', 1200000, 836, '160cm', '??ang b??n', 3);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('B??nh M?? Tr???ng B??ng', 125000, 488, '20cm', '??ang b??n', 4);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('B??nh M?? Tr???ng B??ng', 225000, 44, '40cm', '??ang b??n', 4);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('B??nh M?? Tr???ng B??ng', 325000, 245, '50cm', '??ang b??n', 4);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('S??u B??ng Nh?? ??eo N??', 335000, 266, '90cm', '??ang b??n', 10);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('V???t B??ng M?? Cam', 175000, 949, '40cm', '??ang b??n', 4);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('V???t B??ng M?? Cam', 275000, 439, '50cm', '??ang b??n', 4);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('V???t B??ng M?? Cam', 435000, 804, '65cm', '??ang b??n', 4);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('V???t B??ng M?? Cam', 695000, 271, '85cm', '??ang b??n', 4);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('???c S??n B??ng', 125000, 741, '20cm', '??ang b??n', 4);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('???c S??n B??ng', 175000, 770, '30cm', '??ang b??n', 4);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('???c S??n B??ng', 250000, 503, '45cm', '??ang b??n', 4);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('???c S??n B??ng', 325000, 246, '60cm', '??ang b??n', 4);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Voi B??ng B??ng ????', 265000, 947, '50c', '??ang b??n', 4);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Voi B??ng B??ng ????', 355000, 477, '60cm', '??ang b??n', 4);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('G???u Nh??? R??a B??ng', 75000, 131, '20cm', '??ang b??n', 4);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('G???u B??ng Stitch M???m', 255000, 409, '40cm', '??ang b??n', 5);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('G???u B??ng Stitch M???m', 435000, 189, '80cm', '??ang b??n', 5);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('G???u B??ng Stitch M???m', 835000, 825, '100cm', '??ang b??n', 5);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('G???u B??ng Stitch H???ng', 425000, 967, '60cm', '??ang b??n', 5);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Stitch B???', 495000, 545, '60cm', '??ang b??n', 5);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Stitch B???', 695000, 414, '80cm', '??ang b??n', 5);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Stitch B???', 1050000, 314, '120cm', '??ang b??n', 5);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Totoro B??ng Nh???', 75000, 596, '25cm', '??ang b??n', 6);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Totoro B??ng M???n', 255000, 894, '40cm', '??ang b??n', 6);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Totoro B??ng M???n', 395000, 965, '50cm', '??ang b??n', 6);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Totoro B??ng M???n', 555000, 100, '75cm', '??ang b??n', 6);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Totoro B??ng M???m', 135000, 408, '25cm', '??ang b??n', 6);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Totoro B??ng M???m', 215000, 33, '40cm', '??ang b??n', 6);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Minion 3D M???t B??ng', 145000, 130, '35cm', '??ang b??n', 7);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Minion 3D M???t B??ng', 265000, 195, '45cm', '??ang b??n', 7);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Doremon B??ng Thi??n Th???n', 145000, 806, '25cm', '??ang b??n', 8);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('G???u B??ng Doraemon ??m B??nh', 235000, 52, '40cm', '??ang b??n', 8);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('G???u B??ng Doraemon ??m B??nh', 395000, 118, '60cm', '??ang b??n', 8);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('G???u B??ng Doraemon ??m B??nh', 585000, 922, '70cm', '??ang b??n', 8);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('G???u B??ng Doraemon ??m B??nh', 835000, 382, '90cm', '??ang b??n', 8);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('G???u B??ng Kitty V??y Caro', 195000, 218, '30cm', '??ang b??n', 9);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('G???u B??ng Kitty V??y Caro', 275000, 294, '45cm', '??ang b??n', 9);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('Pikachu B??ng M???m', 255000, 198, '50cm', '??ang b??n', 9);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('G???i ??m Th??? Tai D??u N???m', 175000, 252, '60cm', '??ang b??n', 10);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('G???i ??m Th??? Tai D??u N???m', 265000, 776, '80cm', '??ang b??n', 10);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('G???i ??m Th??? Tai D??u N???m', 435000, 241, '100cm', '??ang b??n', 10);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('G???i ??m Th??? Tai D??u N???m', 555000, 305, '120cm', '??ang b??n', 10);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('G???i ??m Th??? Hoa', 265000, 690, '90cm', '??ang b??n', 10);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('G???i ??m S??u ?????u C???m X??c', 225000, 489, '55cm', '??ang b??n', 10);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('G???i ??m S??u ?????u C???m X??c', 355000, 533, '80cm', '??ang b??n', 10);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('G???i ??m S??u ?????u C???m X??c', 555000, 126, '100cm', '??ang b??n', 10);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('G???i T???a Kh??c X????ng', 335000, 660, '50cm', '??ang b??n', 10);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('G???i C??? Th??', 90000, 153, '35cm', '??ang b??n', 10);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('G???i M???n - Ch?? Shiba N???m', 355000, 847, '60cm', '??ang b??n', 11);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('G???i Ch??n M???n Kh???ng Long M???t Tr??n', 345000, 712, '60cm', '??ang b??n', 11);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('G???i M???n - Th?? ????t Tay', 325000, 793, '40cm', '??ang b??n', 11);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('M??c Kh??a Kitty', 35000, 70, 'Mini', '??ang b??n', 12);
Insert into Product (ProductName,ProductPrice,ProductInventory,ProductSize,ProductStatus,CategoryId) values ('M??c Kh??a B??ng Totoro', 35000, 465, 'Mini', '??ang b??n', 12);
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





















