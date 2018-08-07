<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PersonRequest;
use App\Data\Models\PersonContact;
use App\Data\Models\ContactType;

class PeopleContacts  extends  Controller
{
    /**
     * @return $this
     */
    public function create($person_id)
    {
        $person = $this->peopleRepository->findById($person_id);

        return view('callcenter.peopleContacts.form')
            ->with('person', $person)
            ->with(['contact' => $this->peopleContactsRepository->new()]);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PersonRequest $request)
    {
        $view = 'callcenter.people.form';
        $message = $this->messageDefault;
        if ($request->get('workflow')) {
            $message = 'Reclamação cadastrada com sucesso.';

            $this->createPersonContact($request, 'mobile');
            $this->createPersonContact($request, 'whatsapp');
            $this->createPersonContact($request, 'email');
            $this->createPersonContact($request, 'phone');
        }

        //$request->merge(['id' => $request->get('contact_id')]);
        //$this->peopleContactsRepository->createFromRequest($request);

        $person = $this->peopleRepository->findById(
            $request->get('person_id')
        );
        $calls = $this->callsRepository->findByPerson($person->id);
        $addresses = $this->peopleAddressesRepository->findByPerson(
            $person->id
        );
        $contacts = $this->peopleContactsRepository->findByPerson($person->id);

        return view($view)
            ->with('person', $person)
            ->with('calls', $calls)
            ->with('addresses', $addresses)
            ->with('contacts', $contacts)

            ->with($this->getComboBoxMenus())

            ->with('message', $message);
        //->with('workflow', $request->get('workflow'));
    }

    /**
     * @param $cpf_cnpj
     *
     * @return $this
     */
    public function show($id)
    {
        $contact = $this->peopleContactsRepository->findById($id);
        $person = $this->peopleRepository->findById($contact->person_id);

        return view('callcenter.peopleContacts.form')
            ->with($this->getComboBoxMenus())
            ->with('contact', $contact)
            ->with('person', $person);
    }

    /**
     * @param PersonRequest $request
     */
    private function createPersonContact(PersonRequest $request, $code)
    {
        if ($request->get($code)) {
            PersonContact::create([
                'person_id' => $request->get('person_id'),
                'contact_type_id' =>
                    ContactType::where('code', $code)->first()->id,
                'contact' => $request->get($code),
            ]);
        }
    }
}