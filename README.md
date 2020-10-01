# Blogging Website
This project was created in summer 2019 during my internship at ONGC( Oil and Natural gas Corporation Limited).

1) Clone this repository .
2) Downlaod Xampp .
3) After the download is complete, double-click htdocs folder, then create a new folder, for instance - PHP_files .
4) Now go to your downloads folder , and paste the files of this repository in Blog folder.
5) Now type localhost/phpmydmin in your browser and  create three databases -
  a) Database name - register , Table name - users , Fields  - id (int) , firstname(varchar) , lastname(varchar) , email (varchar), password(varchar) and trn_date(date)
  b) Database name - testing, Table name - tbl_comment, Fields - comment_id(int) , parent_comment_id(int) , comment(varchar) , comment_sender_name(varchar) , date( date).
  c) Database name - records, Table name - players , Fields  -id(int), firstname(varchar) , lastname(varchar)
6) Now go to your browser and type localhost/PHP_files/welcome_home.php 
7) In the github repository here, files with name connect-db, delete, records, view, view-paginated are those which are used to chcek the blogs by the admin.
