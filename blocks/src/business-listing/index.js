import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps } from '@wordpress/block-editor';

registerBlockType('blp/business-listing', {
    title: 'Business Listing',
    icon: 'businessman',
    category: 'widgets',
    edit() {
        const blockProps = useBlockProps();
        return (
            <div {...blockProps}>
                <p>Business Listing Block</p>
            </div>
        );
    },
    save() {
        const blockProps = useBlockProps.save();
        return (
            <div {...blockProps}>
                <p>Business Listing Block</p>
            </div>
        );
    }
});
