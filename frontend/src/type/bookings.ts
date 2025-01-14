export interface Booking {
    booking_id: number;
    customer_id: number;
    court_id: number;
    booking_date: Date;
    start_time: string;
    end_time: string;
    total_amount: number;
    payment_status: 'Pending' | 'Completed';
    created_at: Date;
    updated_at: Date;
}