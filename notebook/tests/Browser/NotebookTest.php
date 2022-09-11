<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NotebookTest extends DuskTestCase
{
    public function testStartPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('Контакты');
        });
    }

    public function testAddContact()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->type('name', 'Анастасия')
                ->type('company', 'mephi')
                ->type('phone', '89169234544')
                ->type('email', 'agnibeda@mephi.ru')
                ->type('birthdate', '1999-11-11')
                ->type('photo', 'W:\domains\localhost\notebook\photo.jpg')
                ->press('add_contact')
                ->assertSee('agnibeda@mephi.ru');
        });
    }

    public function testAddContactRequiredFail()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->type('name', 'Анастасия')
                ->type('company', 'mephi')
                ->type('phone', '89169234544')
                ->type('email', 'agnibeda@mephi.ru')
                ->type('birthdate', '1999-11-11')
                ->type('photo', 'W:\domains\localhost\notebook\photo.jpg')
                ->press('add_contact')
                ->assertSee('Данные уже существуют');
        });
    }

    public function testAddContactUniqueFail()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->type('company', 'mephi')
                ->type('phone', '89169234644')
                ->type('email', 'gnibeda@mephi.ru')
                ->type('birthdate', '1999-11-11')
                ->type('photo', 'W:\domains\localhost\notebook\photo.jpg')
                ->press('add_contact')
                ->assertSee('Поле обязательно для заполнения');
        });
    }

    public function testEditContact()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->clickLink('Изменить')
                ->type('name', 'Андрей')
                ->press('update_contact')
                ->assertSee('agnibeda@mephi.ru');
        });
    }

    public function testDeleteContact()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->press('Удалить')
                ->assertPathIs('/');
        });
    }
}
