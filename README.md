搜尋引擎透過Elasticsearch 實現 我是在windows上安裝，需要下載底層套件
https://www.elastic.co/downloads/elasticsearch

因為是在本機使用，直接用預設的帳號密碼就行
curl -u "elastic:changeme" "http://localhost:9200/_cluster/health?pretty"

下面是成功的回應
{
  "cluster_name" : "elasticsearch",
  "status" : "red",
  "timed_out" : false,
  "number_of_nodes" : 1,
  "number_of_data_nodes" : 1,
  "active_primary_shards" : 0,
  "active_shards" : 0,
  "relocating_shards" : 0,
  "initializing_shards" : 0,
  "unassigned_shards" : 1,
  "delayed_unassigned_shards" : 0,
  "number_of_pending_tasks" : 0,
  "number_of_in_flight_fetch" : 0,
  "task_max_waiting_in_queue_millis" : 0,
  "active_shards_percent_as_number" : 0.0
}

透過這個指令可以將數據同步到elasticsearch
php artisan sync:movies-to-elasticsearch

添加影片腳本
php artisan import:movies