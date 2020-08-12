<?php

namespace App\Services;

use App\Contracts\Repositories\User\AddressRepository;
use App\Contracts\Repositories\User\UserRepository;
use Illuminate\Http\Request;

class UserService
{
    /**
     * User Repository
     *
     * @var \App\Contracts\Repositories\User\UserRepository
     */
    protected $userRepository;

    /**
     * Address Repository
     *
     * @var \App\Contracts\Repositories\User\AddressRepository
     */
    protected $addressRepository;

    public function __construct(
        UserRepository $userRepository,
        AddressRepository $addressRepository)
    {
        $this->userRepository = $userRepository;
        $this->addressRepository = $addressRepository;
    }

    /**
     * Listing user's data
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function list()
    {
        return $this->userRepository->paginate();
    }

    /**
     * Storing new user
     *
     * @param \Illuminate\Http\Request $request
     * @return \App\Data\Models\User
     */
    public function create(Request $request)
    {
        $user = $this->userRepository->create(
            $request->only(['first_name', 'last_name', 'email', 'phone'])
        );
        $address = $this->addressRepository->create($request->input('address'));
        $user->address()->save($address);

        return $user;
    }

    /**
     * Update specified user by given id
     *
     * @param \Illuminate\Http\Request $request
     * @param int|string $id
     * @return \App\Data\Models\User
     */
    public function updateById(Request $request, $id)
    {
        $this->addressRepository->updateById(
            $request->input('address'), $request->input('address.id'));

        return $this->userRepository->updateById(
            $request->only(['first_name', 'last_name', 'email', 'phone']), $id
        );
    }
}
