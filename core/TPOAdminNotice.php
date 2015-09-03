<?php
/**
 * Created by PhpStorm.
 * User: freeman
 * Date: 13.08.15
 * Time: 16:29
 */
namespace core;
class TPOAdminNotice {
    protected $adminNotice = array();
    protected $adminNoticeCustom = array();
    public function __construct(){
        /**
         * admin_notices
         * Срабатывает во время вывода заметок (сообщений, ошибок) в
         * верхней части страницы админ-панели. Прикрепляемая функция
         * должна выводить HTML на экран.
         * Несмотря на то, что сообщение выводится по заголовком,
         * технически это сообщение выводится раньше, оно просто
         * затем перемещается под заголовок скриптом. Сделано это
         * для удобства, чтобы заметку можно было вывести раньше
         * чем выводится HTML код самой страницы.
         * ***********************************************************
         * Классы которые можно использовать для блока:
         * * class="updated" - для успешных операций. Белый фон, зеленая полоска слева;
         * * class="error" - для ошибок. Белый фон, красная полоска слева;
         * * class="notice" - для сообщений. Белый фон, никакой маркировки;
         * * class="notice notice-warning" - для предупреждений. Белый фон,
         *   оранжевая полоска слева;
         * * class="update-nag" - блок с оранжевой полоской слева. Блок
         *   будет расположен перед заголовком <h2> (а не после) и будет
         *   иметь css свойство inline-block (а не block).
         * * class="notice is-dismissible"' - эти два класса можно дописать
         *   к любому из вышеперечисленных и в конце сообщения появится крестик,
         *   чтобы удалить (убрать из вида) блок сообщения. С версии 4.2.
         */
        add_action( 'admin_notices', array( &$this, 'adminNotice'));
        add_action( 'admin_notices', array( &$this, 'adminNoticeCustom'));
    }

    /**
     *
     */
    public function adminNotice(){
        if(!empty($this->adminNotice)){
            $output = '';
            foreach($this->adminNotice as $adminNotice){
                $output .= '<div class="'.$adminNotice['class_notice'].'">
                                <p>';
                $output .=  ( isset($adminNotice['title_notice']) ) ? '<strong>'.$adminNotice['title_notice'].': </strong>' : '';
                $output .=  ( isset($adminNotice['message_notice']) ) ? '<i>'.$adminNotice['message_notice'].'</i>' : '';
                $output .=  ( isset($adminNotice['link_notice']) ) ? '<br><span><a href="'.$adminNotice['link_notice']['url'].'">' .$adminNotice['link_notice']['title'].'</a></span>' : '';
                $output .= '    </p>
                            </div>';
            }
            echo $output;
        }
    }
    public function adminNoticeCustom(){
        if(!empty($this->adminNoticeCustom)){
            $output = '';
            foreach($this->adminNoticeCustom as $adminNotice){
                $output .= $adminNotice;
            }
            echo $output;
        }
    }
    /**
     * @param $key
     * @param $args
     */
    public function adminNoticePush($key, $args){
        $this->adminNotice[$key] = $args;
    }
    public function adminNoticePushCustom($key, $args){
        $this->adminNoticeCustom[$key] = $args;
    }
}