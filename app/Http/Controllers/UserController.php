<?php

namespace App\Http\Controllers;

use App\Data\Models\User\User;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Resources\UserResource;
use App\Services\UserService;

class UserController extends Controller
{
    /**
     * User Service
     *
     * @var \App\Services\UserService
     */
    protected $userService;

    /**
     * Constructor
     *
     * @param \App\Services\UserService $userService
     * @return void
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userService->list();

        return UserResource::collection($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\User\StoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $user = $this->userService->create($request);
        UserResource::withoutWrapping();

        return UserResource::make($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Data\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        UserResource::withoutWrapping();

        return UserResource::make($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\User\UpdateRequest  $request
     * @param  \App\Data\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, User $user)
    {
        $user = $this->userService->updateById($request, $user->id);
        UserResource::withoutWrapping();

        return UserResource::make($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Data\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return;
    }
}
