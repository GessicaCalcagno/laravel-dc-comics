<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comic;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateComicRequest;
use App\Http\Requests\StoreComicRequest;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //prelevo tutti i comics
        $comics = Comic::all();
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     * Per testare se funziona lo store
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     * prende le info dal form e li salva
     */
    public function store(StoreComicRequest $request)
    {
        //controllo che i dati siano corretti
        //l'user deve capure dov'è l'errore

        //___________
        //inserisco tutto nel file storeComicRequirest
        // $request->validate([
        //     'title' => 'required|min:2',
        //     //posso scrivere anche cosi: 'title' => ['required|min:2'],
        //     'description' => 'min:5',
        //     'type'        => 'required',
        //     'thumb'       => 'required',
        //     'series'      => 'required',
        //     'sale_date'   => 'required',
        //     'price'       => 'required',
        // ], [
        //     //in questo modo posso  custumizzare il messaggio di controllo e metterlo in italiano
        //     'title.required' => 'il titolo non può essere vuoto'
        // ]);

        //prelevo tutti i dati dal request e ottengo array associativo
        $data = $request->all();
        // $comic = new Comic();
        //Solo se nel model c'è fillable
        // $comic->fill($data);
        //Salvo nel database
        // $comic->save();
        //dd($data);
        //dd($comic);
        //con create tolgo: new Comic(), fill() e save().
        $comic = Comic::create($data);
        //per non mostrare una pagina vuota reidirizziamo l'utente alla pagina comics.show quindi la pagina dei dettagli ma lo vedremo anche nella lista dei fumetti nell'index
        //possiamo reindirizzarlo anche da altre parti basta che sia GET e non post.
        return redirect()->route('comics.show', ['comic' => $comic->id]);
    }

    /**
     * Display the specified resource.
     * se noi passiamo nei parametri l'oggetto non c'è bisogno di fare findOrFail
     */
    public function show(Comic $comic)
    {
        //se trova il parametro bene se no ci restituisce errore 404
        //$comic = Comic::findOrFail($id);
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     * 1/edit -> id dell'elemento e aggiungi edit nel url
     * dependency injection per non usare findOrFail
     */
    public function edit(Comic $comic)
    {
        //
        //dd($comic);
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateComicRequest $request, Comic $comic)
    {
        //
        $data = $request->all();
        $comic->update($data); //per fare questa operazione serve sempre il $fillable nel model
        return redirect()->route('comics.show', ['comic' => $comic->id]);
    }

    /**
     * Remove the specified resource from storage.
     * * dependency injection per non usare findOrFail
     */
    public function destroy(Comic $comic)
    {
        //dd($comic);
        $comic->delete();
        return redirect()->route('comics.index');
    }
}
