<?php
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with(['user', 'vehicle'])->get();
        return response()->json(['reservations' => $reservations]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'vehicle_id' => 'required|exists:vehicles,id',
            'date' => 'required|date',
        ]);

        $reservation = Reservation::create($validatedData);

        return response()->json(['message' => 'Reservation created successfully', 'reservation' => $reservation]);
    }

    public function update(Request $request, Reservation $reservation)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
        ]);

        $reservation->update($validatedData);

        return response()->json(['message' => 'Reservation updated successfully', 'reservation' => $reservation]);
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return response()->json(['message' => 'Reservation deleted successfully']);
    }
}
