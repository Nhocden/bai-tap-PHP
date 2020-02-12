<?php 
    class Page {
        private $page = "";
        private $title = "";
        private $year;
        private $copyright = "";

        public function getPage(){
            return $this->page;
        }

        public function setPage($page){
            $this->page = $page;
        }

        public function getTitle(){
            return $this->title;
        }

        public function setTitle($title){
            $this->title = $title;
        }

        

        public function getYear(){
            return $this->year;
        }


        public function setYear($year){
            $this->year = $year;
        }

        public function getCopyright(){
            return $this->copyright;
        }
        
        public function setCopyright($copyright){
            $this->copyright = $copyright;
        }

       

        private function addHeader() {
            $header = "<header><h1>Welcome to $this->title</h1></header>";
            $this->page = $header.$this->page;
        }
        public function addContent($content){
            $this->page = $this->page.$content;
        }
        private function addFooter() {
            $footer = " <footer>
                            <p style ='float:left'>Made by $this->copyright</p>
                            <p style ='float:right; margin-right:50%'>Year: $this->year</p>
                        </footer>";
            $this->page = $this->page.$footer;
        }

        

        public function get(){
            $this->addHeader();
            $this->addFooter();
            return $this->page;
        }
    }

    
    

    
   
    if(isset($_POST['formStd'])){
        $title = $_POST["title"];
        $year = $_POST["year"];
        $copyright = $_POST["copyright"];
        $content = $_POST["content"];
        
        $curPage = new Page();
        $curPage->setTitle($title);
        $curPage->setYear($year);
        $curPage->setCopyright($copyright);
        $curPage->addContent($content);
        $page = $curPage->get();
        echo $page;
        
    }
?>

