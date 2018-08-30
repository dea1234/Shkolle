  <?php

     require 'vendor/autoload.php';
 class Forum {
        // we define 3 attributes
        // they are public so that we can access them using $post->author directly
        public $id;
        public $name;
        public $content;
        public $titull;
        public $data;
        public $image;

        public function __construct($id, $name,$content, $titull, $data) {
          $this->id      = $id;
          $this->name  = $name;
          $this->content = $content;
          $this->titull = $titull;
          $this->data = $data;
        }

        public static function all() {
          $list = [];
          $db = Db::getInstance();
          $result = $db->query('SELECT id, name, content, titull FROM forum ORDER BY id DESC');

          
          foreach($result->fetchAll() as $post) {
            $list[] = new Post($post['id'], $post['name'], $post['content'], $post['titull'], $post['data']);
          }

          return $list;
        }



        public function add($title,$content,$id){
           $db = Db::getInstance();

          $result = $db->prepare("SELECT email,name FROM user WHERE id = ?");
          $result->execute([$id]);
          $user = $result->fetch();

          

          if($user != ''){

          $email = $user["email"];
          $name = $user["name"];

          } 
         
        $title = strip_tags($title);
        $content = strip_tags($content);

         $title =  htmlspecialchars($title);
        $content =  htmlspecialchars($content);

        date_default_timezone_set("Tirana/Albania");
          $data =  date("Y-m-d h:i:sa");

            $result = $db->prepare("INSERT INTO forum(titull,content,email,name,data) VALUES (:title,:content, :email, :name, :data)");

              $result->execute(array('title' => $title, 'content' => $content , 'email' => $email , 'name' =>$name ,'data'=> $data ));

              // $result = $db->prepare("SELECT id FROM post ORDER BY id DESC");
              // $result->execute();
              // $user = $result->fetch();
              // while($user != '')
              // {
              // $id = $user['id']; break;
              // }
              //  $result = $db->prepare("INSERT INTO image(fileName,id_p) VALUES (:fileNewName,:id)");

              // $result->execute(array('fileNewName' => $fileNewName, 'id' =>$id ));
             
          // $result = $db->prepare("SELECT id FROM post ORDER BY id DESC");
          // $result->execute([$id]);
          // $user = $result->fetch();

          return true;



        }

        public static function lastPost($id){

            $list = [];
            $db = Db::getInstance();
            $result = $db->query('SELECT id, name, content, titull,data FROM forum ORDER BY id DESC');

          
          foreach($result->fetchAll() as $post) {

              $list[] = new Post($post['id'], $post['name'], $post['image'], $post['content'], $post['titull'], $post['data']);
          }

              return $list;
          
          

        }
      }
    ?>