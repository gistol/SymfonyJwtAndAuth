<?php

namespace App\Controller;

use App\Entity\Document;
use App\Entity\News;
use App\Entity\User;
use App\Repository\DocumentRepository;
use App\Repository\NewsRepository;
use App\Repository\UserRepository;
use App\Service\S3Service;
use Aws\S3\Exception\S3Exception;
use Aws\S3\S3Client;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\Security\Core\Security;


/**
 * @Route("/api",name="api_")
 */
class UserController extends AbstractFOSRestController
{

    /**
     * @Route("/news/{id}", name="news_show")
     */
    public function showNews(News $news)
    {
        return $this->handleView($this->view($news));
    }

    /**
     * @Route("/me", name="me")
     */
    public function getUserAction(Security $security,
        DocumentRepository $documentRepository,
        UserRepository $userRepository,
        NewsRepository $newsRepository,
        S3Service $s3Service)
    {
        /** @var \App\Entity\User $user */
        $user = $this->getUser();

        $user = $userRepository->findOneByEmailField($user->getEmail());
        if($user) {

            $file = sprintf(
                $this->getParameter('aws_base_url').'/%s/document/%s',
                $this->getParameter('aws_bucket_name'),
                $user->getMyDocument()->getDocumentFileName()
            );

            $cmd = $s3Service->getS3Client()->getCommand('GetObject', [
                'Bucket' => $s3Service->getBucket().'/document',
                'Key' => $user->getMyDocument()->getDocumentFileName()
            ]);

            $request = $s3Service->getS3Client()->createPresignedRequest($cmd, '+20 minutes');
        }

        $newses = $newsRepository->findAll();
        $result = [];
        foreach ($newses as $news) {
            $result[] = [
               'title' => $news->getTitle(),
               'subtitle' => $news->getSubtitle(),

            ];
        }


        return $this->handleView($this->view($result));
    }

}

/*
{
    "id": "1S24DX8GRSGM983WG7BZQ6MPKC",
    "name": "Андрей Грач",
    "phone": "+7 (977) 799-7982",
    "avatar": {
    "url": "",
        "width": "200",
        "height": "200"
    },
    "total_progress": 0,
    "courses": [
        {
            "id": "1Q1HHS924VHET7PYWDTQFMS054",
            "title": "Базовый Курс",
            "description": "Old project database",
            "progress": 0
        },
        {
            "id": "1Q1HHS92F1ZT29DFRNSKJSBVQW",
            "title": "Профильный Курс",
            "description": "Old project database",
            "progress": 0
        },
        {
            "id": "1Q1HHS92ZBVJKMSQVNC112SHCW",
            "title": "ЕГЭ",
            "description": "Old project database",
            "progress": 0,
            "tasks_count": 120,
            "completed_tasks_count": 0,
            "score": 2,
            "max_score": 5
        },
        {
            "id": "1RWWJEV8GX11XQQYY82H4V98RW",
            "title": "Keep Summer safe.",
            "description": "Antediluvian non-euclidean indescribable dank gibbous cat charnel madness. Non-euclidean loathsome fungus lurk foetid blasphemous fainted amorphous. Eldritch spectral hideous.",
            "progress": 0
        },
        {
            "id": "1RWWJF1ZCE88V8M9WZT1VKRHR8",
            "title": "Can somebody just let me out of here? If I die in a cage I lose a bet.",
            "description": "Immemorial non-euclidean noisome amorphous unutterable furtive squamous foetid. Antiquarian blasphemous stench furtive tentacles foetid spectral madness. Decadent furtive gibbering comprehension shunned. Blasphemous stygian tentacles hideous dank non-euclidean eldritch. Nameless swarthy loathsome charnel decadent stygian.",
            "progress": 0,
            "tasks_count": 25,
            "completed_tasks_count": 0,
            "score": 2,
            "max_score": 5
        },
        {
            "id": "1RWWJF80RZAEX3EXJ74AZ9PY4M",
            "title": "He's not a hot girl. He can't just bail on his life and set up shop in someone else's.",
            "description": "Foetid dank tentacles comprehension. Accursed decadent furtive stench swarthy non-euclidean dank. Fainted stench fungus non-euclidean eldritch cyclopean. Shunned comprehension eldritch dank foetid fungus stygian fainted. Gibbous accursed gibbering tentacles non-euclidean amorphous dank.",
            "progress": 0,
            "tasks_count": 25,
            "completed_tasks_count": 0,
            "score": 2,
            "max_score": 5
        },
        {
            "id": "1RWWJFE1YSC8Q20Q60PYFMGSTC",
            "title": "Yo! What up my glip glops!",
            "description": "Singular mortal cyclopean unnamable swarthy stench. Gambrel nameless unnamable noisome squamous. Decadent shunned spectral swarthy. Loathsome comprehension hideous abnormal shunned. Shunned tentacles cyclopean.",
            "progress": 0,
            "tasks_count": 25,
            "completed_tasks_count": 0,
            "score": 2,
            "max_score": 5
        }
    ],
    "news": [
        {
            "id": "1REGSH9Z4BPTQG8ZTK6FHY5AZ0",
            "title": "Изменения в ЕГЭ 2019 по Русскому языку",
            "subtitle": "Список самых актуальных изменений на данный момент",
            "body": "1) Изменили требования к сочинению и критерии, по которым его оценивали; \n2) изменили формат заданий 2, 9–12; \n3) добавили задание 21, где ученику нужно провести пунктуационный анализ текста; \n4) расширили диапазон проверяемых орфографических и пунктуационных умений и уточнили уровень сложности отдельных заданий; \n5) съехала нумерация: задание 20 прошлого года стало заданием 6, все остальные съехали вниз. \n\nВ тестовой части стало гораздо меньше подсказок. В ЕГЭ по русскому языку появилось новое задание. Усложнились многие задания первой части (задание №2 и большинство заданий в блоке «Орфография»). В тестовой части стало гораздо меньше подсказок. Изменились критерии сочинения: больше не нужно писать аргументы ни из литературы, ни из жизни. Теперь ученики должны сделать упор на комментарий в сочинении ЕГЭ, поскольку за него теперь дают аж 5 первичных баллов. \n\nУчителя и репетиторы по русскому языку хватаются за головы: неужели дети больше не будут читать? Более того, в новом экзамене съехала вся привычная нумерация заданий: теперь все сборники подготовки к ЕГЭ могут отправляться в мусорку, ведь актуальные появятся на прилавках книжных магазинов ещё не скоро. ",
            "link": null,
            "link_text": null,
            "images": [
                {
                    "url": "https://.storage.googleapis.com/images/files/1RE/GSH/C9Z/thumb/aaf290c18236a061bd2b1ee3c37y--kartiny-i-panno-a-s-pushkin-poster-a3.jpg?1551793109",
                    "width": "200",
                    "height": "200"
                }
            ]
        },
        {
            "id": "1REGSG1JYCMAGCYEVHFZJ0A8B0",
            "title": "Изменения в ЕГЭ 2019 по Математике",
            "subtitle": "Актуальный изменения на данный момент",
            "body": "С этого года меняются правила проведения ЕГЭ по математике. Теперь выпускники школ должны выбрать один уровень ЕГЭ — профильный или базовый. Тогда как раньше им разрешалось сдавать оба экзамена одновременно. \n\nСделать выбор школьники должны до 1 февраля. На сегодняшний день математика является обязательным для сдачи предметом, но чтобы получить аттестат, будет достаточно экзамена базового уровня.  \n\nТеперь экзамен сдать сложнее, так как не все школьники готовятся к профильной математике с 10 класса, а сделать это за 4 месяца до экзамена практически невозможно. А при поступлении в ВУЗ как правило требуется именно профиль. В случае не сдачи экзамена школьник не получает аттестат за 11 классов и ему придется пересдавать экзамен в резервный день. ",
            "link": null,
            "link_text": null,
            "images": [
                {
                    "url": "https://.storage.googleapis.com/images/files/1RE/GSG/300/thumb/pythagoras-harald-ritsch.jpg?1551793076",
                    "width": "200",
                    "height": "200"
                }
            ]
        },
        {
            "id": "1REGSEYQETEETAA3VQ3R7FFT10",
            "title": "Изменения в ЕГЭ 2019 по Обществознанию",
            "subtitle": null,
            "body": "1) Уточнили формулировки и систему оценивания заданий 25, 28, 29; \n2) Увеличили максимальный балл за 25-е задание с 3 до 4; \n3) Максимальный балл за экзамен также увеличился с 64 до 65. \n\nЕщё в прошлом году было достаточно лишь правильно раскрыть смысл понятия и дополнить его двумя предложениями с информацией, которую требовали в задании. Даже несмотря на такие нечёткие требования, максимальный балл за задание получали всего 30% учеников. Теперь же критерии ужесточили и разделили на две группы. \n\nЧто касается раскрытия смысла (критерий 25.1), формулировать определение нужно научно, полно и недвусмысленно, используя родовую принадлежность понятия и все его существенные видовые признаки. Если указать лишь один существенный признак, максимальный балл получить уже не получится. \n\nИзменения коснулись практически всей второй части, где школьникам придется давать полный развернутый ответ на каждое задание ",
            "link": null,
            "link_text": null,
            "images": [
                {
                    "url": "https://.storage.googleapis.com/images/files/1RE/GSF/051/thumb/Aristotel.jpg?1551793048",
                    "width": "200",
                    "height": "200"
                }
            ]
        },
        {
            "id": "1REGSCNCK4DSQN3CGECFPBF78W",
            "title": "Результаты ЕГЭ 2018",
            "subtitle": "Как видим из статистики более 17 тысяч сдававших плохо подготовились к ЕГЭ по математике Базового уровня. Что ж! Нужно лучше готовиться! Переходи в раздел Курсы и прокачивай себя!",
            "body": "Привет! Осталось несколько месяцев до сдачи ЕГЭ.\nПолезным будет ознакомиться с результатами прошлого года:\n\n1) Русский язык\nПроходной порог: 24 балла\nСредний балл: 70,93\nПроцент сдавших на 81-100 баллов: 26,7%\n\nВсего сдававших: 645 500 человек,\nИз них на 100 баллов сдало 3722 ученика (0,57%)\nИ 2582 учеников не сдали ЕГЭ (0,4%).\n\n2) Математика - Профиль\nПроходной порог: 27 балла\nСредний балл: 49,8\n\nВсего сдававших: 421 000 человек,\nИз них на 100 баллов сдало 145 учеников (0,03%)\nИ 2947 учеников не сдали ЕГЭ (7%).\n\n3) Математика - База\nПроходной порог: 3 балла\nСредний балл: 4,29\n\nВсего сдававших: 567 000 человек,\n17 010 учеников не сдали ЕГЭ (3%).\n\n4) Обществознание\nПроходной порог: 42 балла\n\nВсего сдававших: 368 000 человек,\n60 462 учеников не сдали ЕГЭ (16,43%).\n\nВыпускники, которые не набрали минимальных пороговых баллов на обязательных ЕГЭ (базовая математика и русский язык), могут пересдать экзамен в этом же году в резервный день. Если снова не получилось - то в сентябре.",
            "link": null,
            "link_text": null,
            "images": [
                {
                    "url": "https://.storage.googleapis.com/images/files/1RE/GSC/PVW/thumb/problemi-v-uchebe-1024x683.jpg?1551792988",
                    "width": "200",
                    "height": "200"
                }
            ]
        },
        {
            "id": "1REGS7QX8DEBP5Q0VNTGQWXTVR",
            "title": "Обратный отсчет начался",
            "subtitle": "Даты проведения ЕГЭ в России в 2019 году",
            "body": "Основной этап: \n\n29 мая (ср) математика Б, П\n3 июня (пн) русский язык\n10 июня (пн) обществознание\n\n27 мая (пн) география, литература\n31 мая (пт) история, химия\n5 июня (ср) иностранные языки (письменно), физика\n7 июня (пт) иностранные языки (устно)\n8 июня (сб) иностранные языки (устно)\n13 июня (чт) биология, информатика\n\n17 июня (пн) Резерв: география, литература\n18 июня (вт) Резерв: история, физика\n20 июня (чт) Резерв: биология, информатика, химия\n24 июня (пн) Резерв: математика Б, П\n26 июня (ср) Резерв: русский язык\n27 июня (чт) Резерв: иностранные языки (устно)\n28 июня (пт) Резерв: обществознание, иностранные языки (письменно)\n1 июля (пн) Резерв: по всем учебным предметам\n\nДополнительный период (сентябрьские сроки):\n\n3 сентября (вт) русский язык\n6 сентября (пт) математика Б\n20 сентября (пт) резерв: математика Б, русский язык",
            "link": null,
            "link_text": null,
            "images": [
                {
                    "url": "https://.storage.googleapis.com/images/files/1RE/GS7/SKD/thumb/%D0%92%D1%8B%D1%81%D1%88%D0%B5%D0%B5-%D0%BE%D0%B1%D1%80%D0%B0%D0%B7%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D0%B5-%D0%B2-%D0%9A%D0%B0%D0%BD%D0%B0%D0%B4%D0%B5-%D0%9A%D0%BE%D0%BB%D0%BB%D0%B5%D0%B4%D0%B6-1024x680.jpg?1551792859",
                    "width": "200",
                    "height": "200"
                }
            ]
        },
        {
            "id": "1REGKW67D0C5SA1W3ATR46PSAR",
            "title": "Не поступил на бюджет? Плати монету",
            "subtitle": "Анализ стоимости обучения в коммерческих и некоммерческих ВУЗах",
            "body": "Сравнительный анализ приведен для специальности \"Менеджмент\", бакалавров очной формы обучения в 2018 году:\n\n1) МГУ им. Ломоновосва\n395 000 рублей в год\n\n2) НИУ ВШЭ\n420 000 рублей в год\n\n3) МГИМО\n540 000 рублей в год\n\n4) МФТИ\n250 000 рублей в год\n\n5) РАНХиГС\n448 000 рублей в год\n\n6) МФЮУ\n202 000 рублей в год\n\n7) МЭПиП\n120 000 рублей в год\n\n8) РосНоу\n140 000 рублей в год\n\n9) МФПУ \"Синергия\"\n180 000 рублей в год\n",
            "link": null,
            "link_text": null,
            "images": [
                {
                    "url": "https://.storage.googleapis.com/images/files/1RE/GM7/GE7/thumb/1212.jpg?1551788657",
                    "width": "200",
                    "height": "200"
                }
            ]
        }
    ]
}
*/