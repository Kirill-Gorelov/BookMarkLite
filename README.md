# BookMarkLite

![Image of Yaktocat](https://raw.githubusercontent.com/Kirill-Gorelov/BookMarkLite/master/dist/previe-new.png)

### Описание

Замена платным аналогам по управлению ссылками типа Pocket. Без ограничений. Лицензия MIT. OpenSource.

### todo
>Поиск по ссылкам  
>Нормальное отображение уведомлений  
>Защита от дурака по удалению ссылок и папок


## Для личного использования

Создано для использования на локальном сервере.
Нету никакой защиты/авторизации и прочее. Поэтому использовать только на локальном сервере


### Установка

```sql
CREATE TABLE `link` (
  `id` int(11) NOT NULL COMMENT 'Id',
  `title` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'Название',
  `link` text CHARACTER SET utf8 NOT NULL COMMENT 'Название',
  `description` text CHARACTER SET utf8 NOT NULL,
  `folder_id` int(11) NOT NULL COMMENT 'id папки'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `link`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id', AUTO_INCREMENT=73;
COMMIT;



CREATE TABLE `treeview_items` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `text` varchar(200) CHARACTER SET utf8 NOT NULL,
  `parent_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



ALTER TABLE `treeview_items`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `treeview_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;
```