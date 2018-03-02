請用以下的命令複製一份來用<br>
		git clone https://github.com/morganch/yiiMySite.git <br>
會在工作目錄下建立 yiiMySite 目錄，並複製所有程式。接下來切換工作目錄至 yiiMySite <br>
根據原作者的設計， php 使用環境及相關套件是放在 build 目錄裡，要先編譯成映像檔。所以再次切換至 build 目錄，並更改其中 docker-compose.yml 的內容：<br>
...
	    base:
        # Specify a tag name for your base image here:
        image: morganch.idv.tw/yiiapp:base-1.0
        build: ./
...
<br>
這是要使用的基本映像檔名稱及版本，要留意如果在此更動名稱，那上一層裡的 Dockerfile 檔案中的設定也要一併更改！ <br>
<br>
接著回到主目錄，打開 Dockerfile 檔案，這個檔案的用途是接續剛剛完成的那個基本映像檔，再加上範例要使用的所有檔案，並建立要執行 Yii 框架時，所需要的目錄。
而應用站台的運作則是靠 docker-compse 命令來完成，同樣地相關的設定寫在 docker-compose.yml 檔案中。<br>
接下來只要用以下的命令，就可以啟始站台的服務了！<br>
	$docker-compose up <br>
or <br>
	$docker-compose up -d <br>
參數 -d 會讓程式以背景執行，一般用於實際上線，如果是在閞發過程，最好還是能看到站台回應的記錄。至此站台應該可以正常運作了！同樣地要先建立後端資料庫的表格，因為已有 phpmyadmin 前端，就用瀏覽器輸入以下網址：<br>
	http://'your ip':8082/ <br>
來打開管理頁面，8082 的連接埠是在 docker-compose.yml 裡設定的，亦可以改成自己想要的埠號。 <br>
連線的帳號及密碼，同樣記在前述的檔案中，此處要特別注意 server 不能填 localhost，一定要用 ip。 然後將 database 目錄下的表格定義及內容匯入到表格中。
最後用瀏覽器觀看站台內容： <br>
	http://'your ip':8080/  <br>
如果出現存取權限的錯誤，請用以下的命令來修正。 <br>
	$ docker-compose exec web chown www-data web/assets runtime var/sessions <br>
