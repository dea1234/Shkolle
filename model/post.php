  <?php

     require 'vendor/autoload.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;


      class Post {
        // we define 3 attributes
        // they are public so that we can access them using $post->author directly
        public $id;
        public $name;
        public $content;
        public $titull;
        public $data;
        public $image;

        public function __construct($id, $name,$image ,$content, $titull, $data) {
          $this->id      = $id;
          $this->name  = $name;
          $this->content = $content;
          $this->titull = $titull;
          $this->data = $data;
          $this->image = $image;
        }

        public static function all() {
          $list = [];
          $db = Db::getInstance();
          $result = $db->query('SELECT id, name, image, content, titull,data FROM post ORDER BY id DESC');

          
          foreach($result->fetchAll() as $post) {
            $list[] = new Post($post['id'], $post['name'], $post['image'], $post['content'], $post['titull'], $post['data']);
          }

          return $list;
        }



        public function add($title,$content,$id,$fileNewName){
           $db = Db::getInstance();

          $result = $db->prepare("SELECT email,name FROM user WHERE id = ?");
          $result->execute([$id]);
          $user = $result->fetch();

          

          if($user != ''){

          $email = $user["email"];
          $name = $user["name"];

          } 
         

        $image = $fileNewName;

        $title = strip_tags($title);
        $content = strip_tags($content);

         $title =  htmlspecialchars($title);
        $content =  htmlspecialchars($content);

        date_default_timezone_set("Tirana/Albania");
          $data =  date("Y-m-d h:i:sa");

            $result = $db->prepare("INSERT INTO post(titull,image,content,email,name,data) VALUES (:title,:image, :content, :email, :name, :data)");

              $result->execute(array('title' => $title, 'image' => $image,'content' => $content , 'email' => $email , 'name' =>$name ,'data'=> $data ));

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
            $result = $db->query('SELECT id, name, image, content, titull,data FROM post ORDER BY id DESC');

          
          foreach($result->fetchAll() as $post) {

              $list[] = new Post($post['id'], $post['name'], $post['image'], $post['content'], $post['titull'], $post['data']);
          }

              return $list;
          
          

        }

      }
    ?>