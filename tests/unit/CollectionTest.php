<?php 
use PHPUnit\Framework\TestCase;
use App\Support\Collection;

class CollectionTest extends TestCase 
{   
    /**
     * Store collections
     *
     * @var array
     */
    protected $collection;

    /**
     * Initiate
     *
     * @return void
     */
    public function setUp():void
    {
        $this->collection = new Collection([1, 2, 3, 4, 5, 6]);
    }

    /** @test */
    public function empty_instantiated_collection_returns_no_item()
    {
        $collection = new Collection;
        $this->assertEmpty($collection->get());
    }

    /** @test */
    public function count_is_correct_for_items_passed_in()
    {
        $collection = new Collection([1, 2, 3]);

        $this->assertEquals(3,$collection->count());
    }

    /** @test */
    public function item_returned_match_items_passed_in()
    {
        $collection = new Collection([1, 2]);

        $this->assertCount(2, $collection->get());
        $this->assertEquals(2,$collection->count());
    }

    /** @test */
    public function collection_is_instance_of_iterrator_agreegate()
    {
        $collection = new Collection;
        $this->assertInstanceOf(IteratorAggregate::class, $collection );
    }

    /** @test */
    public function collection_can_be_iterated()
    {
        $collection = new Collection([
            'one', 'two', 'three', 'four'
        ]);

        $items = [];

        foreach($collection as $item) {
            $items[] = $item;
        }

        $this->assertCount(4, $items);
    }

    /** @test */
    public function collection_can_be_merged_with_another_collection()
    {
        $collection1 = new Collection([1, 2, 3]);
        $collection2 = new Collection([4, 5, 6]);

        $collection1->merge($collection2);

        $this->assertCount(6, $collection1->get());
    }

    /** @test */
    public function can_add_existing_collection()
    {
        $collection = new Collection(['One', 'Two']);
        $collection->add(['three']);

        $this->assertEquals(3, $collection->count());
        $this->assertCount(3, $collection->get());
    }

    /** @test */
    public function returns_json_encoded_items()
    {
        $collection = new Collection([
            [ 'username'    => 'Hasinur' ],
            [ 'username'    => 'Rahman' ]
        ]);
        
        $this->assertEquals('[{"username":"Hasinur"},{"username":"Rahman"}]', $collection->toJson());
    }
}