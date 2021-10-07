<?php

namespace App\Http\Controllers;

use App\Integration\Database\Post;
//use http\Env\Request;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Contracts\Foundation\Application as ApplicationAlias;
use Illuminate\Contracts\View\Factory;
use App\Http\Requests\ContactValidation;
use App\Models\Messages;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\View\View;

/**
 * class MessageController
 */
class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('contact');
    }

    /**
     * Отправка данных из формы в базу данных с переходом на главную страницу
     * @param ContactValidation $req
     * @return RedirectResponse
     */
    public function submit(ContactValidation $req): RedirectResponse
    {
        $contact = new Messages();
        $contact->name = $contact->escapeString($req->input('name'));
        $contact->email = $contact->escapeString($req->input('email'));
        $contact->homepage = $contact->escapeString($req->input('homepage'));
        $contact->message = $contact->escapeString($req->input('message'));

        $contact->save();

        return redirect()->route('home')->with('success', 'Сообщение было добавлено');
    }

    /**
     * Вывод сообщений из базы данных
     * @return ApplicationAlias|Factory|View
     */
    public function list(): View
    {
        $messages = new Messages;

        /** @var Paginator $paginator */
        $paginatorMessages = $messages->orderBy('id', 'asc')->paginate(10);

        return view('message', [
            'messages' => $paginatorMessages,
        ]);
    }

    /**
     * Демонстрация сообщения
     *
     */
    public function show($id)
    {
        $messages = new Messages();

        return view('one-message', [
            'data' => $messages->find($id)
        ]);
    }

    /**
     * Редактирование сообщения
     * @param $id
     * @return ApplicationAlias|Factory|View
     */
    public function update($id)
    {
        $messages = new Messages();
        $message = $messages->find($id);

        if ($this->_isEditMessage($message)) {
            return view('update-message', [
                'data' => $message,
            ]);
        }

        return response(redirect(url('/message')), 404);
    }

    /**
     * Отправка обновленного сообщения в базу данных
     * @param $id
     * @param ContactValidation $req
     * @return RedirectResponse
     */
    public function save($id, ContactValidation $req): RedirectResponse
    {
        $message = Messages::find($id);
        $message->name = $req->input('name');
        $message->email = $req->input('email');
        $message->homepage = $req->input('homepage');
        $message->message = $req->input('message');

        $message->save();

        return redirect()->route('message-data-one', $id)->with('success', 'Сообщение обновлено');
    }

    /**
     * Удаление страницы
     * @param $id
     * @return ApplicationAlias|ResponseFactory|RedirectResponse|Response
     */
    public function delete($id)
    {
        $messages = new Messages();
        $message = $messages->find($id);

        if ($this->_isEditMessage($message)) {
            return redirect()->route('message')->with('success', "Сообщение удалено");
        }

        return response(redirect(url('/message')), 404);
    }

    /**
     * Поисковая система
     * @param Request $request
     * @return ApplicationAlias|Factory|View
     */
    public function search(Request $request)
    {
        $search = $request->search;
        $countMessageOnPage = config('app.count_message_on_page');

        $message = new Messages();
        $messages = $message->where('name', 'LIKE', "%{$search}%")
            ->orWhere('message', 'LIKE', "%{$search}%")
            ->orderBy('name')
            ->paginate($countMessageOnPage);

        return view('inc.search', compact('messages'));

    }

    private function _isEditMessage($message): bool
    {
        $currentUserIsAdmin = Auth::user()->role === 'ROLE_ADMIN';
        $currentUserIsOwnerMessage = Auth::user()->getAuthIdentifier() === $message->toArray()['user_id'];
        return $currentUserIsOwnerMessage || $currentUserIsAdmin;
    }
}
