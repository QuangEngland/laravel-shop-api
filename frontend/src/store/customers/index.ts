import { Customer } from "@/type/customer";
import { createAsyncThunk, createSlice } from "@reduxjs/toolkit";

const fetchCustomers = createAsyncThunk('admin/fetchCustomers', async () => {
    const response = await fetch('/api/customers');
    return response.json();
})


interface InitialState {
    customers: Customer[];
    loading: boolean;
    error: unknown;
}
const initialState = { 
    customers: [],
    loading: false,
    error: null,
} as InitialState 

const customersSlice = createSlice({
    name: 'appCustomers',
    initialState,
    reducers: {},
    extraReducers: (builder) => { 
        builder.addCase(fetchCustomers.pending, (state) => {
            state.loading = true;
            state.error = null;
        });
        builder.addCase(fetchCustomers.fulfilled, (state, action) => {
            state.customers = action.payload;
            state.loading = false;
            state.error = null;
        });
        builder.addCase(fetchCustomers.rejected, (state, action) => {
            state.loading = false;
            state.error = action.error.message;
        });
    },
})

export default customersSlice.reducer;