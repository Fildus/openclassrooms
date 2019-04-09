<?php


namespace Tests\App\Model\Router;


trait PathTest
{



    private $routesGetCallable = [
        /**                         USERS                           */
        [NULL,                                  'Front','chapters'  , 1 ],
        ['',                                    'Front','chapters'  , 1 ],
        ['/',                                   'Front','chapters'  , 1 ],
        ['chapitres/page-1',                    'Front','chapters'  , 1 ],
        ['chapitres/page-2',                    'Front','chapters'  , 1 ],
        ['chapitre-1',                          'Front','chapter'   , 1 ],
        ['chapitre-2',                          'Front','chapter'   , 1 ],
        ['article-1',                           'Front','post'      , 1 ],
        ['article-2',                           'Front','post'      , 1 ],
        ['article-3',                           'Front','post'      , 1 ],
        ['article-4',                           'Front','post'      , 1 ],

        /**                         ADMIN                           */
        ['admin/chapitres/page-1',              'Back','chapters'   , 3 ],
        ['admin/chapitres/page-2',              'Back','chapters'   , 3 ],
        ['admin/chapitre-1',                    'Back','chapter'    , 3 ],
        ['admin/chapitre-2',                    'Back','chapter'    , 3 ],
        ['admin/articles/page-1',               'Back','articles'   , 3 ],
        ['admin/articles/page-2',               'Back','articles'   , 3 ],
        ['admin/article-1',                     'Back','article'    , 3 ],
        ['admin/article-2',                     'Back','article'    , 3 ],
        ['admin/commentaires/page-1',           'Back','comments'   , 2 ],
        ['admin/commentaires/page-2',           'Back','comments'   , 2 ],
        ['admin/commentaire-1',                 'Back','comment'    , 2 ],
        ['admin/commentaire-2',                 'Back','comment'    , 2 ],
        ['admin/utilisateurs/page-1',           'Back','users'      , 4 ],
        ['admin/utilisateurs/page-2',           'Back','users'      , 4 ],
        ['admin/utilisateur-1',                 'Back','user'       , 4 ],
        ['admin/utilisateur-1',                 'Back','user'       , 4 ],

    ];

    private $badRoutesGetCallable = [

        '/something',
        '/something/something',
        '/chapitre-a12',
        '/chapitres-12',
        '/châpitre-1',
        'chapitre-a1',
        '1chapitre-1',
        'article -1',
        'articles/page-a',
        'articles/page-',
        'admin/chapitre-5a'

    ];

}