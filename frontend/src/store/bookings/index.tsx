import { Booking } from "@/type/bookings";
import { createAsyncThunk, createSlice } from "@reduxjs/toolkit";

const fetchBookings = createAsyncThunk('admin/fetchBookings', async () => {
    const response = await fetch('/api/bookings');
    return response.json();
});

interface InitialState {
    bookings: Booking[];
    loading: boolean;
    error: unknown;
}

const initialState: InitialState = { 
    bookings: [],
    loading: false,
    error: null,
}

const bookingsSlice = createSlice({
    name: 'admin/bookings',
    initialState,
    reducers: {},
    extraReducers: (builder) => { 
        builder.addCase(fetchBookings.pending, (state) => {
            state.loading = true;
            state.error = null;
        });
        builder.addCase(fetchBookings.fulfilled, (state, action) => {
            state.bookings = action.payload;
            state.loading = false;
            state.error = null;
        });
        builder.addCase(fetchBookings.rejected, (state, action) => {
            state.loading = false;
            state.error = action.error.message;
        });
    },
})

export default bookingsSlice.reducer;